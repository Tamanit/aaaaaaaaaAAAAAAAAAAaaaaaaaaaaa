<?php

namespace App\Services;

use App\Enumeration\ErrorCodes;
use Illuminate\Database\Eloquent\Model;

class RestService
{
    protected string $model;

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

    /** @throws \Exception set model first */
    public function getPagination(array $meta, int $perPage)
    {
        $this->checkModel();
        if (!key_exists('columns', $meta)) {
            return $meta;
        }
        $query = $this->model::select(array_keys($meta['columns']));

        if (key_exists('leftJoins', $meta)) {
            $query = $this->connectLeftJoins($meta['leftJoins'], $query, app($this->model)->getTable());
        }
        return $query->paginate($perPage);
    }
    protected function connectLeftJoins(array $leftJoins, $query, $mainTable)
    {
        foreach ($leftJoins as $leftJoin) {
            $query = $query->leftJoin($leftJoin['table'], "{$leftJoin['table']}.id", '=', "{$mainTable}.{$leftJoin['foreignKey']}");
            if (key_exists('leftJoins', $leftJoin)) {
                $query = $this->connectLeftJoins($leftJoin['leftJoins'], $query, $leftJoin['table']);
            }
        }

        return $query;
    }


    /** @throws \Exception set model first */
    public function getById(int $id)
    {
        return $this->checkModel()->find($id);
    }

    public function createOrUpdate(array $data)
    {
        $id = key_exists('id', $data) ? $data['id'] : null;

        if (null !== $id) {
            unset($data['id']);
        }

        return $this->checkModel()->createOrUpdate(
            ['id' => key_exists('id', $data) ? $data['id'] : null],
            $data
        );
    }

    /** @throws \Exception set model first */
    public function delete(int|array|Model $trash)
    {
        if ($trash instanceof Model) {
            return $trash->delete();
        } else {
            return $this->checkModel()->destroy($trash);
        }

    }
}
