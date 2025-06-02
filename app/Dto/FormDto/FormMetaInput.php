<?php

namespace App\Dto\FormDto;



use App\Enumeration\InputTypes;
use Illuminate\Support\Collection;

class FormMetaInput
{
    /**
     * @param string $name
     * @param InputTypes $type
     * @param string|null $label
     * @param Collection<FormMetaOption>|null $options
     * @param FormMetaTable|null $table
     * @param string|null $value
     * @param bool $vanishValue
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
