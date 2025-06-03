<?php

namespace App\Dto\IndexDto;

use Illuminate\Support\Collection;

class IndexMetaLeftJoin
{
    /** @param Collection<IndexMetaLeftJoin>|null $leftJoins */
    public function __construct(
        public string $table,
        public string $foreignKey,
        public ?Collection $leftJoins = null,
    ) {
    }
}
