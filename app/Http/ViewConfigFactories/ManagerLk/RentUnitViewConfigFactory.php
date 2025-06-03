<?php

namespace App\Http\ViewConfigFactories\ManagerLk;



use App\Dto\FormDto\Factory\FormMetaFactory;
use App\Dto\IndexDto\Factory\IndexMetaFactory;
use App\Enumeration\InputTypes;
use App\Http\ViewConfing\ViewConfig;
use App\Models\RentUnit;
use App\Models\RentUnitType;

class RentUnitViewConfigFactory extends ViewConfig
{
    public function __construct(
        protected IndexMetaFactory $indexMetaFactory,
        protected FormMetaFactory $formMetaFactory,
    ) {
    }

    public function fill(): ViewConfig
    {
        $viewConfig = new ViewConfig();

        $rentUnitTypeTable = app(RentUnitType::class)->getTable();
        $rentUnitTable = app(RentUnit::class)->getTable();
        $viewConfig->indexMeta = $this->indexMetaFactory->make([
            'h2' => 'Юниты Аренды',
            'page' => 'managerLk/Index',
            'columns' => [
                ["{$rentUnitTable}.id" => 'id'],
                ["{$rentUnitTable}.code" => 'Код'],
                ["{$rentUnitTypeTable}.name" => 'Тип юнита аренды'],
            ],
            'leftJoins' => [
                [
                    'table' => $rentUnitTypeTable,
                    'foreignKey' => 'type_id',
                ],
            ]
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

    public function setIndexMetaFactory(IndexMetaFactory $indexMetaFactory): RentUnitViewConfigFactory
    {
        $this->indexMetaFactory = $indexMetaFactory;
        return $this;
    }
}

