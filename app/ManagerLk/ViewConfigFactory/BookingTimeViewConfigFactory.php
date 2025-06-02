<?php

namespace App\ManagerLk\ViewConfigFactory;

use App\Models\RentUnitType;
use App\Models\Tariff;
use App\Shared\Dto\FormDto\Factory\FormMetaFactory;
use App\Shared\Dto\IndexDto\Factory\IndexMetaFactory;
use App\Shared\Enumeration\InputTypes;
use App\Shared\ViewConfing\ViewConfig;

class BookingTimeViewConfigFactory extends ViewConfig
{
    public function __construct(
        protected IndexMetaFactory $indexMetaFactory,
        protected FormMetaFactory $formMetaFactory,
    ) {}

    public function fill(): ViewConfig
    {
        $viewConfig = new ViewConfig();

        $viewConfig->indexMeta = $this->indexMetaFactory->make([
            'h2' => 'Время бронирования',
            'page' => 'managerLk/Index',
            'columns' => [
                ['id' => 'id'],
                ['rent_unit_type_id' => 'Тип аренды'],
                ['tariff_id' => 'Тариф'],
                ['free_hours_in_month' => 'Бесплатных часов в месяц'],
            ],
        ]);

        $viewConfig->createMeta = $this->formMetaFactory->make([
            'h2' => 'Создание правила бронирования',
            'page' => 'managerLk/Form',
            'inputs' => [
                [
                    'label' => 'Тип арендуемой единицы',
                    'name' => 'rent_unit_type_id_id',
                    'type' => InputTypes::select,
                    'options' => RentUnitType::select('id as id', 'name as value')->get()->toArray(),
                ],
                [
                    'label' => 'Тариф',
                    'name' => 'tariff_id',
                    'type' => InputTypes::select,
                    'options' => Tariff::select('id as id', 'name as value')->get()->toArray(),
                ],
                [
                    'label' => 'Бесплатных часов в месяц',
                    'name' => 'free_hours_in_month',
                    'type' => InputTypes::number,
                ],
            ]
        ]);

        $viewConfig->updateMeta = $viewConfig->createMeta;

        return $viewConfig;
    }
}
