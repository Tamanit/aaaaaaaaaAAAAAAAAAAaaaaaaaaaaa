<?php

namespace App\Shared\Dto\FormDto\Factory;

use App\Shared\Dto\FormDto\FormMetaOption;
use Illuminate\Support\Collection;

class FormMetaOptionFactory
{
    public function make(array $data): FormMetaOption
    {
        return new FormMetaOption(
            $data['id'],
            $data['value'],
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
