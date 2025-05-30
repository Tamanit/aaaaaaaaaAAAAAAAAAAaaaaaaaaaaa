<?php

namespace App\Shared\Dto\FormDto;

use Illuminate\Support\Collection;

class FormMeta
{
    /**
     * @param Collection<FormMetaInput> $inputs
     */
    public function __construct(
        public string $page,
        public Collection $inputs,
        public ?string $submitLink = null,
    ) {
    }
}
