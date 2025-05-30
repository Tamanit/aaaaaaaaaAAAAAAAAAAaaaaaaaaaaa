<?php

namespace App\Shared\ViewConfing;

use App\Shared\Dto\FormDto\FormMeta;
use App\Shared\Dto\IndexDto\IndexMeta;
use App\Shared\Dto\ShowDto\ShowMeta;

class ViewConfig
{
    public IndexMeta $indexMeta;
    public FormMeta $createMeta;
    public FormMeta $updateMeta;
    public ShowMeta $showMeta;
}
