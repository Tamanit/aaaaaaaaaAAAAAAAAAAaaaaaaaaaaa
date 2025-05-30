<?php

namespace App\Http\Controllers;

use App\Models\Addon;
use App\Models\PriceList;
use App\Services\RestService;

class AddonController extends RestController
{
    protected string $model = Addon::class;
    public static string $routeName = 'addons';
    public function __construct(RestService $restService)
    {
        $this->indexMeta = [
            'columns' => [
                'id' => 'id',
                'name' => 'Название',
                'description' => 'Описание',
            ],
            'toolbarButtons' => [
                [],
            ]
        ];

        $lines = (new AddonController($restService))->createMeta['inputs'];
        unset($lines[0]);
        $lines = array_values($lines);

        $this->createMeta = [
            'inputs' => [
                [
                    'label'=> 'Название',
                    'type'=> 'text',
                    'name'=> 'name',
                ],
                [
                    'label'=> 'Описание',
                    'type'=> 'text',
                    'name'=> 'description',
                ],
                [
                    'label' => 'Price List',
                    'type' => 'table',
                    'model' => PriceList::class,
                    'condition' => 'price_list_id',
                    'lines' => $lines,
                ]
            ]
        ];

        parent::__construct($restService);
    }
}
