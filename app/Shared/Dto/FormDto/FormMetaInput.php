<?php

namespace App\Shared\Dto\FormDto;

use App\Shared\Enumeration\InputTypes;
use Illuminate\Support\Collection;

class FormMetaInput
{
    /**
     * @param string|null $label
     * @param string $name
     * @param InputTypes $type
     * @param Collection<FormMetaOption>|null $options
     * @param FormMetaTable|null $table
     * @param string|null $value
     */
    public function __construct(
        public string $name,
        public InputTypes $type,
        public ?string $label = null,
        public ?Collection $options = null,
        public ?FormMetaTable $table = null,
        public ?string $value = null,
        public bool $vanishValue = false,
    ) {
    }
}
