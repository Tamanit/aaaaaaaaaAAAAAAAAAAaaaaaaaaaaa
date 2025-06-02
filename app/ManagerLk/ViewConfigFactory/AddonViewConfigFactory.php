<?php

namespace App\ManagerLk\ViewConfigFactory;

use App\Models\Tariff;
use App\Shared\Dto\FormDto\Factory\FormMetaFactory;
use App\Shared\Dto\IndexDto\Factory\IndexMetaFactory;
use App\Shared\Enumeration\InputTypes;
use App\Shared\ViewConfing\ViewConfig;

class AddonViewConfigFactory extends ViewConfig
{
    public function __construct(
        protected IndexMetaFactory $indexMetaFactory,
        protected FormMetaFactory $formMetaFactory,
    ) {}

    public function fill(): ViewConfig
    {
        $viewConfig = new ViewConfig();

        $viewConfig->indexMeta = $this->indexMetaFactory->make([
            'h2' => 'Дополнительные услуги',
            'page' => 'managerLk/Index',
            'columns' => [
                ['id' => 'id'],
                ['name' => 'Название'],
                ['description' => 'Описание'],
                ['tariff_id' => 'Тариф'],
            ]
        ]);

        $tariffOptions = Tariff::select('id as id', 'name as value')->get()->toArray();

        $formInputs = [
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
                'label' => 'Тариф',
                'name' => 'tariff_id',
                'type' => InputTypes::select,
                'options' => $tariffOptions,
            ],
        ];

        $viewConfig->createMeta = $this->formMetaFactory->make([
            'h2' => 'Создание доп. услуги',
            'page' => 'managerLk/Form',
            'inputs' => $formInputs,
        ]);

        $viewConfig->updateMeta = $this->formMetaFactory->make([
            'h2' => 'Редактирование доп. услуги',
            'page' => 'managerLk/Form',
            'inputs' => $formInputs,
        ]);

        return $viewConfig;
    }
}
