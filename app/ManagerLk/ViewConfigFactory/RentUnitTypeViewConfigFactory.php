<?php

namespace App\ManagerLk\ViewConfigFactory;

use App\Shared\Dto\FormDto\Factory\FormMetaFactory;
use App\Shared\Dto\IndexDto\Factory\IndexMetaFactory;
use App\Shared\Enumeration\InputTypes;
use App\Shared\ViewConfing\ViewConfig;

class RentUnitTypeViewConfigFactory extends ViewConfig
{
    public function __construct(
        protected IndexMetaFactory $indexMetaFactory,
        protected FormMetaFactory $formMetaFactory,
    ) {}

    public function fill(): ViewConfig
    {
        $viewConfig = new ViewConfig();

        $viewConfig->indexMeta = $this->indexMetaFactory->make([
            'h2' => 'Типы арендуемых единиц',
            'page' => 'managerLk/Index',
            'columns' => [
                ['id' => 'ID'],
                ['name' => 'Название'],
                ['description' => 'Описание'],
            ]
        ]);

        $inputs = [
            [
                'label' => 'Название',
                'name' => 'name',
                'type' => InputTypes::text,
            ],
            [
                'label' => 'Описание',
                'name' => 'description',
                'type' => InputTypes::textarea,
            ],
            [
                'label' => 'Изображение',
                'name' => 'img',
                'type' => InputTypes::file,
            ],
            [
                'label' => '"Alt" изображения',
                'name' => 'ing_alt',
                'type' => InputTypes::text,
            ],
        ];

        $viewConfig->createMeta = $this->formMetaFactory->make([
            'h2' => 'Создание типа арендуемой единицы',
            'page' => 'managerLk/Form',
            'inputs' => $inputs,
        ]);

        $viewConfig->updateMeta = $this->formMetaFactory->make([
            'h2' => 'Редактирование типа арендуемой единицы',
            'page' => 'managerLk/Form',
            'inputs' => $inputs,
        ]);

        return $viewConfig;
    }
}
