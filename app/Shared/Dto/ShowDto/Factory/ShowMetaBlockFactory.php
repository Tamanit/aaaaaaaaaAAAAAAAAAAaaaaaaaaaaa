<?php

namespace App\Shared\Dto\ShowDto\Factory;

use App\Shared\Dto\IndexDto\Factory\IndexMetaFactory;
use App\Shared\Dto\ShowDto\ShowMetaBlock;
use Illuminate\Support\Collection;

class ShowMetaBlockFactory
{
    public function __construct(
        protected IndexMetaFactory $indexMetaFactory
    ) {
    }

    public function make(array $data): ShowMetaBlock
    {
        return new ShowMetaBlock(
            $data['attribute'],
            $data['type'],
            $this->indexMetaFactory->make($data['index']),
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
