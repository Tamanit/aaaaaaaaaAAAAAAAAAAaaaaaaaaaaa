<?php

namespace App\Shared\Dto\IndexDto\Factory;

use App\Shared\Dto\IndexDto\IndexMeta;

class IndexMetaFactory
{
    public function __construct(
        protected IndexMetaColumnFactory $indexMetaColumnFactory,
        protected IndexMetaLeftJoinFactory $indexMetaLeftJoinFactory,
    ) {
    }

    public function make(array $data): IndexMeta
    {
        return new IndexMeta(
            $data['h2'],
            $data['page'],
            $this->indexMetaColumnFactory->makeCollection($data['columns']),
            key_exists('leftJoins', $data) ? $this->indexMetaLeftJoinFactory->makeCollection($data['leftJoins']) : null,
        );
    }
}
