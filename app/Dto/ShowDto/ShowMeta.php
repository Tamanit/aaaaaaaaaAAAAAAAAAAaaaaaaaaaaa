<?php

namespace App\Dto\ShowDto;

use Illuminate\Support\Collection;

class ShowMeta
{
    /**
     * @param Collection<\App\Dto\ShowDto\ShowMetaBlock> $blocks
     */
    public function __construct(
        public string $page,
        public Collection $blocks
    ) {
    }
}


