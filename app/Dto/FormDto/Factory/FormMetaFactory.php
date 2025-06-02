<?php

namespace App\Dto\FormDto\Factory;

use App\Dto\FormDto\FormMeta;

class FormMetaFactory
{
    public function __construct(
        protected FormMetaInputFactory $formMetaInputFactory,
    ) {
    }

    public function make(array $data): FormMeta
    {
        return new FormMeta(
            $data['h2'],
            $data['page'],
            $this->formMetaInputFactory->makeCollection($data['inputs']),
        );
    }
}
