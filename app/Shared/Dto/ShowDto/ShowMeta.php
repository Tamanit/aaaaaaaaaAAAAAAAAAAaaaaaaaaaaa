<?php

namespace App\Shared\Dto\ShowDto;


use Illuminate\Support\Collection;

class ShowMeta
{
    /**
     * @param Collection<ShowMetaBlock> $blocks
     */
    public function __construct(
        public string $page,
        public Collection $blocks
    ) {
    }
}


