<?php

namespace App\Shared\Dto\FormDto;

class FormMetaOption
{
    public function __construct(
        public string $id,
        public string $value,
    ) {}
}
