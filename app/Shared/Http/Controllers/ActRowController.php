<?php

namespace App\Shared\Http\Controllers;

use App\Shared\Enumeration\ActType;
use App\Shared\Models\ActRow;
use App\Shared\Models\Contract;
use App\Shared\Models\RentUnit;
use App\Shared\Service\RestService;


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
