<?php

namespace App\Dto\ShowDto;

use App\Dto\IndexDto\IndexMeta;
use App\Enumeration\ShowBlockType;

class ShowMetaBlock
{
    public function __construct(
        public string $attribute,
        public ShowBlockType $blockType,
        public ?IndexMeta $table = null,
        public $value = null,
    ) {
    }
}
