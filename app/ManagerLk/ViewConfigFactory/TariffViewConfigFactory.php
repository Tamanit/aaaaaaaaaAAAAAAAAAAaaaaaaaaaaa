<?php

namespace App\ManagerLk\ViewConfigFactory;

use App\Models\Addon;
use App\Models\BookingTime;
use App\Models\Price;
use App\Models\PriceList;
use App\Shared\Dto\FormDto\Factory\FormMetaFactory;
use App\Shared\Dto\FormDto\FormMetaInput;
use App\Shared\Dto\IndexDto\Factory\IndexMetaFactory;
use App\Shared\Enumeration\InputTypes;
use App\Shared\ViewConfing\ViewConfig;

class TariffViewConfigFactory extends ViewConfig
{
    public function __construct(
        protected IndexMetaFactory $indexMetaFactory,
        protected FormMetaFactory $formMetaFactory,
    ) {}

    public function fill(): ViewConfig
    {
        $viewConfig = new ViewConfig();

        $viewConfig->indexMeta = $this->indexMetaFactory->make([
            'h2' => 'Тарифы',
            'page' => 'managerLk/Index',
            'columns' => [
                ['id' => 'ID'],
                ['name' => 'Название'],
                ['description' => 'Описание'],
            ]
        ]);

        $viewConfig->createMeta = $this->formMetaFactory->make([
            'h2' => 'Создание тарифа',
            'page' => 'managerLk/Form',
            'inputs' => [
                [
                    'label' => 'Название',
                    'name' => 'name',
                    'type' => InputTypes::text,
                ],
                [
                    'label' => 'Описание',
                    'name' => 'description',
                    'type' => InputTypes::text,
                ],
                [
                    'label' => 'Прайс-лист',
                    'name' => 'price_list_id',
                    'type' => InputTypes::select,
                    'options' => PriceList::select('id as id', 'created_at as value')->get()->toArray(),
                ],
                [
                    'name' => 'table',
                    'type' => InputTypes::table,
                    'label' => 'Цены',
                    'table' => [
                        'model' => Price::class,
                        'condition' => 'tariff_id',
                        'columnsTitle' => app(PriceViewConfigFactory::class)->fill()->createMeta->inputs->filter(fn(FormMetaInput $input) => $input->name !== 'tariff_id')->values(),
                    ],
                ],
                [
                    'name' => 'table',
                    'type' => InputTypes::table,
                    'label' => 'Дополнительные услуги',
                    'table' => [
                        'model' => Addon::class,
                        'condition' => 'tariff_id',
                        'columnsTitle' => app(AddonViewConfigFactory::class)->fill()->createMeta->inputs->filter(fn(FormMetaInput $input) => $input->name !== 'tariff_id')->values(),
                    ],
                ],
                [
                    'name' => 'table',
                    'type' => InputTypes::table,
                    'label' => 'Бронирование доп. помещенией',
                    'table' => [
                        'model' => BookingTime::class,
                        'condition' => 'tariff_id',
                        'columnsTitle' => app(BookingTimeViewConfigFactory::class)->fill()->createMeta->inputs->filter(fn(FormMetaInput $input) => $input->name !== 'tariff_id')->values(),
                    ],
                ],
            ]
        ]);

        $viewConfig->updateMeta = $viewConfig->createMeta;

        return $viewConfig;
    }
}
