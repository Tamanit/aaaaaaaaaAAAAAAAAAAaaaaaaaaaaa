<?php

namespace App\Shared\Service;

use App\Shared\Dto\FormDto\Factory\FormMetaInputFactory;
use App\Shared\Dto\FormDto\FormMeta;
use App\Shared\Dto\FormDto\FormMetaInput;
use App\Shared\Dto\FormDto\FormMetaTable;
use App\Shared\Dto\IndexDto\IndexMeta;
use App\Shared\Dto\IndexDto\IndexMetaLeftJoin;
use App\Shared\Dto\ShowDto\ShowMeta;
use App\Shared\Dto\ShowDto\ShowMetaBlock;
use App\Shared\Enumeration\ErrorCodes;
use App\Shared\Enumeration\InputTypes;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;

class RestService
{
    protected string $model;
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
        $query = $this->checkModel()::select($meta->columns->pluck('attribute'));

        if ($meta->leftJoins !== null) {
            $this->connectLeftJoin($meta->leftJoins, $query, app($this->model)->getTable());
        }

        return $query->paginate(self::ROWS_PER_PAGE);
    }

    protected function connectLeftJoin(Collection $leftJoins, Builder &$query, string $mainTable): void
    {
        $leftJoins->each(function (IndexMetaLeftJoin $item) use (&$query, $mainTable) {
            $query = $query->leftJoin($item->table, "{$item->table}.id", '=', "{$mainTable}.{$item->foreignKey}");

            if ($item->leftJoins !== null) {
                $this->connectLeftJoin($item->leftJoins, $query, $item->table);
            }
        });
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
        $meta->submitLink = "/{$route}";
        return $meta;
    }

    /**
     * @throws \Exception
     */
    public function saveOrUpdate(array $data, int $id = null): void
    {
        if ($id === null) {
            $this->checkModel()::create($data);
        } else {
            $this->checkModel()::findOrFail($id)->update($data);
        }
    }

    public function deleteById(int $id): void
    {
        $this->checkModel()::findOrFail($id)->delete();
    }

    public function insertValuesInInput(FormMeta $meta, int $id): FormMeta
    {
        $model = $this->checkModel()::findOrFail($id);

        $meta->inputs->map(function (FormMetaInput $input) use ($model) {
            $input->value = $input->type === InputTypes::table
                ? $this->fillTableInput($input->table, $model->id)
                : $model->{$input->name};
        });

        return $meta;
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

    public function insertAttributes(ShowMeta $meta, int $id): ShowMeta {
        $model = $this->checkModel()::findOrFail($id);

        $meta->blocks->map(function (ShowMetaBlock $block) use ($model) {
            $block->value = $model->{$block->attribute};
        });

        return $meta;
    }
}
