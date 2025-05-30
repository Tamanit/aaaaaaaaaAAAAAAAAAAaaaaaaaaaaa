<?php

namespace App\Http\Controllers;

use App\Enumeration\ActType;
use App\Models\ActRow;
use App\Models\Contract;
use App\Models\Rent;
use App\Models\RentUnit;
use App\Services\RestService;

class ActRowController extends RestController
{
    protected string $model = ActRow::class;
    public static string $routeName = 'actRows';
    public function __construct(RestService $restService)
    {
        $this->indexMeta = [
            'columns' => [
                'id' => 'id',
                'act_id' => 'Акт',
                'rent_unit_id' => 'Аренда',
                'technical_condition' => 'Состояние'
            ],
            'toolbarButtons' => [
                [],
            ]
        ];

        $lines = (new ActRowController($restService))->createMeta['inputs'];
        unset($lines[0]);
        $lines = array_values($lines);

        $this->createMeta = [
            'inputs' => [
                [
                    'label'=> 'Техническое состояние',
                    'type'=> 'text',
                    'name'=> 'technical_condition',
                ],
                [
                    'label' => 'Предмет аренды',
                    'type' => 'table',
                    'model' => RentUnit::class,
                    'condition' => 'rent_unit_id',
                    'lines' => $lines,
                ]
            ]
        ];

        parent::__construct($restService);
    }

}
