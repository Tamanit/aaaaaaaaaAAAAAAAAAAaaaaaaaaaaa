<?php

namespace App\Http\Services;

use App\Http\Enumeration\ErrorCodes;
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
            throw new \Exception('Model not set, set model first', ErrorCodes::NullModel);
        }
        return $this->model;
    }

    /** @throws \Exception set model first */
    public function getPagination(int $perPage)
    {
        return $this->checkModel()->paginamte($perPage);
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
    public function delete( int|array|Model $trash)
    {
        if ($trash instanceof Model) {
            return $trash->delete();
        } else {
            return $this->checkModel()->destroy($trash);
        }

    }
}
