<?php

namespace App\Shared\Dto\FormDto\Factory;

use App\Shared\Dto\FormDto\FormMetaInput;
use Illuminate\Support\Collection;

class FormMetaInputFactory
{
    public function __construct(
        protected FormMetaOptionFactory $formMetaOptionFactory,
        protected FormMetaTableFactory $formMetaTableFactory
    ) {
    }

    public function make(array $data): FormMetaInput
    {
        return new FormMetaInput(
            $data['name'],
            $data['type'],
            key_exists('label', $data) ? $data['label'] : null,
            key_exists('options', $data) ? $this->formMetaOptionFactory->makeCollection($data['options']) : null,
            key_exists('table', $data) ? $this->formMetaOptionFactory->makeCollection($data['table']) : null,
            key_exists('value', $data) ? $data['value'] : null,

        );
    }

    public function makeCollection(array $data): Collection
    {
        return new Collection(
            array_map(function ($item) {
                return $this->make($item);
            }, $data)
        );
    }
}
