<?php

namespace App\Shared\Dto\FormDto\Factory;

use App\Shared\Dto\FormDto\FormMeta;

class FormMetaFactory
{
    public function __construct(
        protected FormMetaInputFactory $formMetaInputFactory,
    ) {
    }

    public function make(array $data): FormMeta
    {
        return new FormMeta(
            $data['page'],
            $this->formMetaInputFactory->makeCollection($data['inputs']),
        );
    }
}
