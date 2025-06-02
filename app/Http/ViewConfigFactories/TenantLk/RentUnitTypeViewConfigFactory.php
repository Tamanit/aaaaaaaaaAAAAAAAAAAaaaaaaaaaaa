<?php

namespace App\Http\ViewConfigFactories\TenantLk;

use App\Dto\FormDto\Factory\FormMetaFactory;
use App\Dto\IndexDto\Factory\IndexMetaFactory;
use App\Enumeration\InputTypes;
use App\Http\ViewConfing\ViewConfig;
use App\Models\RentUnitType;
use App\Models\Tariff;

class RentUnitTypeViewConfigFactory extends ViewConfig
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
            'h2' => 'Арендовать рабочее место ',
            'page' => 'rentLk/IndexCards',
            'table' => Tariff::class,
            'columns' => [
                ['id' => ''],
                ["name" => 'Тайтл'],
                ["description" => 'Описание'],
//                ["img" => 'Изображение'],
//                ["ing_alt" => 'alt изображения'],
            ],
        ]);

        $options = RentUnitType::select('id as id', 'name as value')->get()->toArray();

        $viewConfig->createMeta = $this->formMetaFactory->make([
            'h2' => 'Создание юнита араенды',
            'page' => 'managerLk/Form',
            'inputs' => [
                [
                    'label' => 'Код',
                    'name' => 'code',
                    'type' => InputTypes::text,
                ],
                [
                    'label' => 'Тип помещения',
                    'name' => 'type_id',
                    'type' => InputTypes::select,
                    'options' => $options,
                ],
            ]
        ]);

        $viewConfig->updateMeta = $this->formMetaFactory->make([
            'h2' => 'Редактирование юнита аренды',
            'page' => 'managerLk/Form',
            'inputs' => [
                [
                    'label' => 'Код',
                    'name' => 'code',
                    'type' => InputTypes::text,
                ],
                [
                    'label' => 'Тип помещения',
                    'name' => 'type_id',
                    'type' => InputTypes::select,
                    'options' => $options,
                ],
            ]
        ]);

        return $viewConfig;
    }
}

