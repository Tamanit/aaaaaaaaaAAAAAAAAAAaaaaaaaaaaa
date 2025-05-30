<?php

namespace App\Shared\Dto\IndexDto\Factory;

use App\Shared\Dto\IndexDto\IndexMetaLeftJoin;
use Illuminate\Support\Collection;

class IndexMetaLeftJoinFactory
{
    public function make(array $data): IndexMetaLeftJoin
    {
        return new IndexMetaLeftJoin(
            $data['table'],
            $data['foreignKey'],
            $data['leftJoins'] ? $this->make($data['leftJoins']) : null
        );
    }

    public function makeCollection(array $data): Collection
    {
        return new Collection(
            array_map(function ($item) {
                return $this->make($item);
            }, $data)
        );
    }
}
