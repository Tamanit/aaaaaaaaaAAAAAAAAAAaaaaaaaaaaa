<?php

namespace App\Dto\IndexDto;



use Illuminate\Support\Collection;

class IndexMeta
{
    /**
     * @param Collection<\App\Dto\IndexDto\IndexMetaColumn> $columns
     * @param Collection<\App\Dto\IndexDto\IndexMetaLeftJoin>|null $leftJoins
     */
    public function __construct(
        public string $h2,
        public string $page,
        public Collection $columns,
        public ?string $table,
        public ?Collection $leftJoins = null,
    ) {
    }
}
