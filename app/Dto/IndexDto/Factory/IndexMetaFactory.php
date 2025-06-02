<?php

namespace App\Dto\IndexDto\Factory;



use App\Dto\IndexDto\IndexMeta;

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
            key_exists('table', $data) ? $data['table'] : null,
            key_exists('leftJoins', $data) ? $this->indexMetaLeftJoinFactory->makeCollection($data['leftJoins']) : null,
        );
    }
}
