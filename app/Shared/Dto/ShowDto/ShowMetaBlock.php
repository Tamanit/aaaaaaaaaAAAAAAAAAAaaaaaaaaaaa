<?php

namespace App\Shared\Dto\ShowDto;

use App\Shared\Dto\IndexDto\IndexMeta;
use App\Shared\Enumeration\ShowBlockType;

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
