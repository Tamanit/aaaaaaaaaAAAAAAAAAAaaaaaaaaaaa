<?php

namespace App\Http\ViewConfigFactories\ManagerLk;

use App\Dto\FormDto\Factory\FormMetaFactory;
use App\Dto\FormDto\FormMetaInput;
use App\Dto\IndexDto\Factory\IndexMetaFactory;
use App\Enumeration\InputTypes;
use App\Http\ViewConfing\ViewConfig;
use App\Models\Tariff;

class PriceListViewConfigFactory extends ViewConfig
{
    public function __construct(
        protected IndexMetaFactory $indexMetaFactory,
        protected FormMetaFactory $formMetaFactory
    ) {}

    public function fill(): ViewConfig
    {
        $viewConfig = new ViewConfig();

        $viewConfig->indexMeta = $this->indexMetaFactory->make([
            'h2' => 'Прайс-листы',
            'page' => 'managerLk/Index',
            'columns' => [
                ['id' => 'ID'],
                ['created_at' => 'Создан'],
            ]
        ]);

        $viewConfig->createMeta = $this->formMetaFactory->make([
            'h2' => 'Создание прайс-листа',
            'page' => 'managerLk/Form',
            'inputs' => [
                [
                    'name' => 'table',
                    'type' => InputTypes::table,
                    'label' => 'Тарифы',
                    'table' => [
                        'model' => Tariff::class,
                        'condition' => 'price_list_id',
                        'columnsTitle' => app(TariffViewConfigFactory::class)->fill()->createMeta->inputs->filter(fn(FormMetaInput $input) => $input->name !== 'price_list_id')->values(),
                    ],
                ],
            ]
        ]);

        $viewConfig->updateMeta = $this->formMetaFactory->make([
            'h2' => 'Редактирование прайс-листа',
            'page' => 'managerLk/Form',
            'inputs' => [
                // Пока нет полей
            ]
        ]);

        return $viewConfig;
    }
}
