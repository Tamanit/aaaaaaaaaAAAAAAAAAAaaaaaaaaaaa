<?php

namespace App\RentLk\ViewConfigFactory;

use App\Models\RentUnit;
use App\Models\RentUnitType;
use App\Shared\Dto\FormDto\Factory\FormMetaFactory;
use App\Shared\Dto\IndexDto\Factory\IndexMetaFactory;
use App\Shared\Enumeration\InputTypes;
use App\Shared\ViewConfing\ViewConfig;

class BookingViewConfigFactory extends ViewConfig
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
            'h2' => 'Бронирования',
            'page' => 'rentLk/IndexCards',
            'table' => RentUnitType::class,
            'columns' => [
                ['id' => ''],
                ['name' => ''],
                ['description' => ''],
                ['img' => ''],
                ['ing_alt' => ''],
            ]
        ]);

        $inputs = [
            [
                'label' => 'Рабочее место',
                'name' => 'rent_unit_id',
                'type' => InputTypes::select,
                'options' => RentUnit::select('id as id', 'code as value')->get()->toArray(),
            ],
            [
                'label' => 'Дата начала',
                'name' => 'book_at',
                'type' => InputTypes::datetime,
            ],
            [
                'label' => 'Дата окончания',
                'name' => 'book_until',
                'type' => InputTypes::datetime,
            ],
            [
                'label' => 'Время (мин)',
                'name' => 'time_in_minutes',
                'type' => InputTypes::number,
            ],
        ];

        $viewConfig->createMeta = $this->formMetaFactory->make([
            'h2' => 'Создание бронирования',
            'page' => 'managerLk/Form',
            'inputs' => $inputs,
        ]);

        $viewConfig->updateMeta = $this->formMetaFactory->make([
            'h2' => 'Изменение бронирования',
            'page' => 'managerLk/Form',
            'inputs' => $inputs,
        ]);

        return $viewConfig;
    }
}
