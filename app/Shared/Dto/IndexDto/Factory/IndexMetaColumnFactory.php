<?php

namespace App\Shared\Dto\IndexDto\Factory;

use App\Shared\Dto\IndexDto\IndexMetaColumn;
use Illuminate\Support\Collection;

class IndexMetaColumnFactory
{
    public function make(array $data): IndexMetaColumn
    {
        return new IndexMetaColumn(
            key($data),
            $data[key($data)],
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
