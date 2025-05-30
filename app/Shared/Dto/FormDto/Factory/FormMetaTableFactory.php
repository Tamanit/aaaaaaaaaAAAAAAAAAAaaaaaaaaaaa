<?php

namespace App\Shared\Dto\FormDto\Factory;

use App\Shared\Dto\FormDto\FormMetaTable;
use Illuminate\Support\Collection;

class FormMetaTableFactory
{
    public function make(array $data): FormMetaTable
    {
        $rows = null;

        if (key_exists('rows', $data)) {
            $rows = Collection::make($data['rows']);

            $rows = $rows->map(function ($row) {
                return Collection::make($row);
            });
        }

        return new FormMetaTable(
            $data['model'],
            $data['condition'],
            Collection::make($data['columnsTitle']),
            $rows
        );
    }

}
