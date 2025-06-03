<?php

namespace App\Service;

use App\Dto\FormDto\Factory\FormMetaInputFactory;
use App\Dto\FormDto\FormMeta;
use App\Dto\FormDto\FormMetaInput;
use App\Dto\FormDto\FormMetaTable;
use App\Dto\IndexDto\IndexMeta;
use App\Dto\ShowDto\ShowMeta;
use App\Dto\ShowDto\ShowMetaBlock;
use App\Enumeration\InputTypes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use UnitEnum;

class RestService
{
    protected string $model = '';
    protected const ROWS_PER_PAGE = 20;

    public function __construct(
        protected FormMetaInputFactory $formMetaInputFactory,
    ) {
    }

    public function setModel(string $model): static
    {
        $this->model = $model;
        return $this;
    }

    /** @throws \Exception set model first */
    protected function checkModel(): string
    {
        if (!$this->model) {
            throw new \Exception('ОЙ-ей, модельки нет!', ErrorCodes::NullModel);
        }
        return $this->model;
    }

    /** @throws \Exception не задана модель */
    public function getPagination(IndexMeta $meta)
    {
        $query = ($meta->table ?? $this->checkModel())::select($meta->columns->pluck('attribute')->toArray());
        if ($meta->leftJoins !== null) {
            $query = $this->connectLeftJoin($meta->leftJoins, $query, app($this->model)->getTable());;
        }

        return $query->paginate(self::ROWS_PER_PAGE);
    }

    protected function connectLeftJoin(Collection $leftJoins, Builder $query, string $mainTable): Builder
    {
        foreach ($leftJoins as $item) {
            $query = $query->leftJoin($item->table, "{$item->table}.id", '=', "{$mainTable}.{$item->foreignKey}");

            if ($item->leftJoins !== null) {
                $query = $this->connectLeftJoin($item->leftJoins, $query, $item->table);
            }
        }
        return $query;
    }

    public function insertCsrfTokenAndSubmitLink(FormMeta $meta, string $route): FormMeta
    {
        $meta->inputs->push(
            $this->formMetaInputFactory->make(
                [
                    'type' => InputTypes::hidden,
                    'name' => '_token',
                    'value' => csrf_token(),
                ]
            )
        );
        $meta->submitLink = $route;
        return $meta;
    }

    /**
     * @throws \Exception
     */
    public function saveOrUpdate(array $data, int $id = null): void
    {
        $dataSortedInModels = [];
        foreach ($data as $key => $value) {
            $keys = explode('__', $key);

            if (count($keys) === 3) {
                $dataSortedInModels[$keys[0]][$keys[2]] = $value;
                $dataSortedInModels[$keys[0]]['foreign_key'] = $keys[1];
            } else {
                $dataSortedInModels[$this->model][$keys[0]] = $value;
            }
//            dump($keys);
        }

//        dd($dataSortedInModels);
        if ($id === null) {
            $targetModelData = [];
            if (key_exists($this->model, $dataSortedInModels)) {
                $targetModelData = $dataSortedInModels[$this->model];

                foreach ($targetModelData as $key => $value) {
                    if ($value instanceof UploadedFile ) {
                        $targetModelData[$key] = $this->saveFile($value);
                    } elseif (is_array($value)) {
                        $targetModelData[$key] = json_encode($value, JSON_UNESCAPED_UNICODE);
                    }
                }
            }

            $model = $this->checkModel()::create($targetModelData);

            unset($dataSortedInModels[$this->model]);
            $modelsAttributes = [];
            foreach ($dataSortedInModels as $modelClass => $values) {
                $foreignKey = $values['foreign_key'];
                unset($values['foreign_key']);

                foreach ($values as $key => $value) {
                    foreach ($value as $k => $v) {
                        $modelsAttributes[$modelClass][$k][$key] = $v;

                        $modelsAttributes[$modelClass][$k][$foreignKey] = $model->id;
                    }

                }

                foreach ($modelsAttributes as $model => $attributesPatch) {
                    foreach ($attributesPatch as $attributes) {
                        $model::create($attributes);
                    }
                }

            }
        } else {
            $model = $this->checkModel()::findOrFail($id);
            $model->update($data);
            $model->save();
        }
    }

    protected function saveFile(UploadedFile $file): string
    {
        $fileName = Hash::make($file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path() . '/img',$fileName);

        return $fileName;
    }

    public function deleteById(int $id): void
    {
        $this->checkModel()::findOrFail($id)->delete();
    }

    public function insertValuesInInput(FormMeta $meta, int $id): FormMeta
    {
        $model = $this->checkModel()::findOrFail($id);

        $meta->inputs->map(function (FormMetaInput $input) use ($model) {
            if (!$input->vanishValue) {
                $input->value = $input->type === InputTypes::table
                    ? $this->fillTableInput($input->table, $model->id)
                    : $this->fillInput($model, $input);
            }
        });

        return $meta;
    }

    protected function fillInput($model, FormMetaInput $input)
    {
        if ($model->{$input->name} instanceof UnitEnum) {
            return $model->{$input->name}->value;
        } else {
            return $model->{$input->name};
        }
    }

    protected function fillTableInput(FormMetaTable $table, int $modelId): FormMetaTable
    {
        $dataCollection = $table->model::select($table->columnsTitles->get('attribute'))->where(
            $table->condition,
            $modelId
        )->get();

        $dataCollection->each(function (Collection $row) use ($table) {
            $table->rows->push(
                $row
            );
        });

        return $table;
    }

    public function insertAttributes(ShowMeta $meta, int $id): ShowMeta
    {
        $model = $this->checkModel()::findOrFail($id);

        $meta->blocks->map(function (ShowMetaBlock $block) use ($model) {
            $block->value = $model->{$block->attribute};
        });

        return $meta;
    }

    public function getRequest(Request $request, string $formRequest = null): array
    {
        if ($formRequest === null) {
            return $request->all();
        } else {
            $formRequestEntity = app($formRequest);
            $formRequestEntity = $formRequestEntity->createFrom($request);
            $formRequestEntity->setContainer(app())->setRedirector(app('redirect'));

            if (method_exists($formRequestEntity, 'authorize') && !$formRequestEntity->authorize()) {
                abort(403, 'Недостаточно прав.');
            }

            $validator = Validator::make(
                $formRequestEntity->all(),
                $formRequestEntity->rules(),
                $formRequestEntity->messages() ?? [],
                $formRequestEntity->attributes() ?? []
            );

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            return $validator->validated();
        }
    }
}
