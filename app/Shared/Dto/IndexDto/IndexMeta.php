<?php

namespace App\Shared\Dto\IndexDto;

use Illuminate\Support\Collection;

class IndexMeta
{
    /**
     * @param Collection<IndexMetaColumn> $columns
     * @param Collection<IndexMetaLeftJoin>|null $leftJoins
     */
    public function __construct(
        public string $page,
        public Collection $columns,
        public ?Collection $leftJoins = null,
    ) {
    }
}
