<?php

namespace App\Shared\Http\Controllers;

use App\Shared\Enumeration\ActType;
use App\Shared\Models\Act;
use App\Shared\Models\ActRow;
use App\Shared\Models\Contract;
use App\Shared\Service\RestService;

class ActController extends RestController
{
    protected string $model = Act::class;
    public static string $routeName = 'acts';

    public function __construct(RestService $restService)
    {
        $this->indexMeta = [
            'columns' => [
                'id' => 'id',
                'act_type' => 'Тип',
                'signed' => 'Подпись'
            ],
            'toolbarButtons' => [
                ['title' => 'Подписать', 'link' => 'acts/sign'],
            ]
        ];

        $lines = (new ActController($restService))->createMeta['inputs'];
        unset($lines[0]);
        $lines = array_values($lines);

        $this->createMeta = [
            'inputs' => [
                [
                    'label' => 'Договор',
                    'type' => 'select',
                    'name' => 'contract_id',
                    'options' => Contract::select('contract.id as key', 'contract.contract_num as value')
                        ->get()
                        ->toArray()
                ],
                [
                    'label' => 'Тип акта',
                    'type' => 'select',
                    'name' => 'act_type',
                    'options' => ActType::toArray(),
                ],
                [
                    'type' => 'table',
                    'model' => ActRow::class,
                    'condition' => 'act_id',
                    'lines' => $lines,
                ]
            ]
        ];

        parent::__construct($restService);
    }


}
