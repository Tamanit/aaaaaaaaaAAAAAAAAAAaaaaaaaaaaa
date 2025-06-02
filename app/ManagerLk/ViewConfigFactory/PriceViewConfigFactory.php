<?php

namespace App\ManagerLk\ViewConfigFactory;

use App\Models\Tariff;
use App\Shared\Dto\FormDto\Factory\FormMetaFactory;
use App\Shared\Dto\IndexDto\Factory\IndexMetaFactory;
use App\Shared\Enumeration\InputTypes;
use App\Shared\ViewConfing\ViewConfig;

class PriceViewConfigFactory extends ViewConfig
{
    public function __construct(
        protected IndexMetaFactory $indexMetaFactory,
        protected FormMetaFactory $formMetaFactory,
    ) {
    }

    public function fill(): ViewConfig
    {
        $viewConfig = new ViewConfig();

        $viewConfig->indexMeta = $this->indexMetaFactory->make([
            'h2' => 'Цены',
            'page' => 'managerLk/Index',
            'columns' => [
                ['id' => 'id'],
                ['tariff_id' => 'Тариф'],
                ['period_in_months' => 'Период (мес)'],
                ['sum_in_kopeck' => 'Сумма (коп)'],
            ]
        ]);

        $tariffOptions = Tariff::select('id as id', 'name as value')->get()->toArray();

        $formInputs = [
            [
                'label' => 'Тариф',
                'name' => 'tariff_id',
                'type' => InputTypes::select,
                'options' => $tariffOptions,
            ],
            [
                'label' => 'Период в месяцах',
                'name' => 'period_in_months',
                'type' => InputTypes::number,
            ],
            [
                'label' => 'Сумма (в копейках)',
                'name' => 'sum_in_kopeck',
                'type' => InputTypes::number,
            ],
        ];

        $viewConfig->createMeta = $this->formMetaFactory->make([
            'h2' => 'Создание цены',
            'page' => 'managerLk/Form',
            'inputs' => $formInputs,
        ]);

        $viewConfig->updateMeta = $this->formMetaFactory->make([
            'h2' => 'Редактирование цены',
            'page' => 'managerLk/Form',
            'inputs' => $formInputs,
        ]);

        return $viewConfig;
    }
}

