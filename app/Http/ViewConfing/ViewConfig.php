<?php

namespace App\Http\ViewConfing;

use App\Dto\FormDto\FormMeta;
use App\Dto\IndexDto\IndexMeta;
use App\Dto\ShowDto\ShowMeta;

class ViewConfig
{
    public IndexMeta $indexMeta;
    public FormMeta $createMeta;
    public FormMeta $updateMeta;
    public ShowMeta $showMeta;
}
