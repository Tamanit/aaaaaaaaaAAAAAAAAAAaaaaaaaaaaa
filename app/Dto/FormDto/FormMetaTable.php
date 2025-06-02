<?php

namespace App\Dto\FormDto;



use App\Dto\IndexDto\IndexMetaColumn;
use Illuminate\Support\Collection;

class FormMetaTable
{
    /**
     * @param string $model
     * @param string $condition
     * @param Collection<IndexMetaColumn> $columnsTitles
     * @param Collection|null $rows
     */
    public function __construct(
        public string $model,
        public string $condition,
        public Collection $columnsTitles,
        public ?Collection $rows = null,
    ) {}
}
