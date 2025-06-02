<?php

namespace App\Dto\IndexDto;

class IndexMetaColumn
{
    public function __construct(
        public string $attribute,
        public string $label,
    ) {
    }
}
