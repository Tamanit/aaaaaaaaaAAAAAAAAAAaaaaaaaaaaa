<?php

namespace App\Dto\FormDto;



use Illuminate\Support\Collection;

class FormMeta
{
    /**
     * @param Collection<FormMetaInput> $inputs
     */
    public function __construct(
        public string $h2,
        public string $page,
        public Collection $inputs,
        public ?string $submitLink = null,
    ) {
    }
}
