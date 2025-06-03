<?php

namespace App\Http\ViewConfigFactories\TenantLk;

use App\Dto\FormDto\Factory\FormMetaFactory;
use App\Dto\IndexDto\Factory\IndexMetaFactory;
use App\Enumeration\InputTypes;
use App\Http\ViewConfing\ViewConfig;
use App\Models\Booking;
use App\Models\RentUnit;
use App\Models\RentUnitType;
use App\Models\Room;

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
            'page' => 'rentLk/IndexCardsBooking',
            'table' => Room::class,
            'columns' => [
                ['id' => ''],
                ['name' => ''],
                ['description' => ''],
                ['inventory' => ''],
                ['status' => ''],
                ['img' => ''],
                ['img_alt' => ''],
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
