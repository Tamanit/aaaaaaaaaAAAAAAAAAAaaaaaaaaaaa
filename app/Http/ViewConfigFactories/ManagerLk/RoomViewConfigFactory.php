<?php

namespace App\Http\ViewConfigFactories\ManagerLk;

use App\Dto\FormDto\Factory\FormMetaFactory;
use App\Dto\IndexDto\Factory\IndexMetaFactory;
use App\Enumeration\InputTypes;
use App\Enumeration\RoomStatus;
use App\Http\ViewConfing\ViewConfig;

class RoomViewConfigFactory extends ViewConfig
{
    public function __construct(
        protected IndexMetaFactory $indexMetaFactory,
        protected FormMetaFactory $formMetaFactory,
    ) {}

    public function fill(): ViewConfig
    {
        $viewConfig = new ViewConfig();

        $viewConfig->indexMeta = $this->indexMetaFactory->make([
            'h2' => 'Комнаты',
            'page' => 'managerLk/Index',
            'columns' => [
                ['id' => 'ID'],
                ['name' => 'Название'],
                ['description' => 'Описание'],
                ['status' => 'Статус'],
            ],
        ]);

        $formInputs = [
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
                'label' => 'Статус',
                'name' => 'status',
                'type' => InputTypes::select,
                'options' => RoomStatus::toArray(),
            ],
            [
                'label' => 'Инвентарь',
                'name' => 'inventory',
                'type' => InputTypes::array,
            ],
            [
                'label' => 'Изображение',
                'name' => 'img',
                'type' => InputTypes::file,
            ],
            [
                'label' => '"Alt" изображения',
                'name' => 'img_alt',
                'type' => InputTypes::text,
            ],

        ];

        $viewConfig->createMeta = $this->formMetaFactory->make([
            'h2' => 'Создание комнаты',
            'page' => 'managerLk/Form',
            'inputs' => $formInputs,
        ]);

        $viewConfig->updateMeta = $viewConfig->createMeta;

        return $viewConfig;
    }
}
