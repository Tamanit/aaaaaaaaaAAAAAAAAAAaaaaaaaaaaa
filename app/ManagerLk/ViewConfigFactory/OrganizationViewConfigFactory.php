<?php

namespace App\ManagerLk\ViewConfigFactory;

use App\Shared\Dto\FormDto\Factory\FormMetaFactory;
use App\Shared\Dto\IndexDto\Factory\IndexMetaFactory;
use App\Shared\Enumeration\InputTypes;
use App\Shared\ViewConfing\ViewConfig;

class OrganizationViewConfigFactory extends ViewConfig
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
            'h2' => 'Организации',
            'page' => 'managerLk/Index',
            'columns' => [
                ['id' => 'id'],
                ['full_name' => 'Название'],
                ['inn' => 'ИНН'],
                ['kpp' => 'КПП'],
                ['bank' => 'Банк'],
            ]
        ]);

        $inputs = [
            ['label' => 'Полное наименование', 'name' => 'full_name', 'type' => InputTypes::text],
            ['label' => 'Юридический адрес', 'name' => 'ur_address', 'type' => InputTypes::text],
            ['label' => 'Почтовый адрес', 'name' => 'post_address', 'type' => InputTypes::text],
            ['label' => 'Банк', 'name' => 'bank', 'type' => InputTypes::text],
            ['label' => 'ИНН', 'name' => 'inn', 'type' => InputTypes::text],
            ['label' => 'КПП', 'name' => 'kpp', 'type' => InputTypes::text],
            ['label' => 'Р/счёт', 'name' => 'bank_account', 'type' => InputTypes::text],
            ['label' => 'К/счёт', 'name' => 'bank_corr_account', 'type' => InputTypes::text],
            ['label' => 'БИК', 'name' => 'bik', 'type' => InputTypes::text],
            ['label' => 'ОКПО', 'name' => 'okpo', 'type' => InputTypes::text],
        ];

        $viewConfig->createMeta = $this->formMetaFactory->make([
            'h2' => 'Создание организации',
            'page' => 'managerLk/Form',
            'inputs' => $inputs,
        ]);

        $viewConfig->updateMeta = $this->formMetaFactory->make([
            'h2' => 'Изменение организации',
            'page' => 'managerLk/Form',
            'inputs' => $inputs,
        ]);

        return $viewConfig;
    }
}
