<?php

namespace App\Http\ViewConfigFactories\ManagerLk;


use App\Dto\FormDto\Factory\FormMetaFactory;
use App\Dto\FormDto\FormMetaInput;
use App\Dto\IndexDto\Factory\IndexMetaFactory;
use App\Enumeration\InputTypes;
use App\Http\ViewConfing\ViewConfig;
use App\Models\Addon;
use App\Models\BookingTime;
use App\Models\Price;
use App\Models\PriceList;

class TariffViewConfigFactory extends ViewConfig
{
    protected FormMetaFactory $formMetaFactory;

    public function __construct(
        protected IndexMetaFactory $indexMetaFactory,
        FormMetaFactory $formMetaFactory,
    ) {
        $this->formMetaFactory = $formMetaFactory;
    }

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
