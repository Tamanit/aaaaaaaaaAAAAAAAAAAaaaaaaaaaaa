<?php

namespace App\ManagerLk\ViewConfigFactory;

use App\Shared\Dto\FormDto\Factory\FormMetaFactory;
use App\Shared\Dto\IndexDto\Factory\IndexMetaFactory;
use App\Shared\Enumeration\InputTypes;
use App\Shared\ViewConfing\ViewConfig;

class UserViewConfigFactory extends ViewConfig
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
            'h2' => 'Арендаторы',
            'page' => 'managerLk/Index',
            'columns' => [
                ['id' => 'id'],
                ['name' => 'name'],
                ['email' => 'email'],
            ]
        ]);
        $viewConfig->createMeta = $this->formMetaFactory->make([
            'h2' => 'Создание арендатора',
            'page' => 'managerLk/Form',
            'inputs' => [
                [
                    'label' => 'Имя',
                    'name' => 'name',
                    'type' => InputTypes::text,
                ],
                [
                    'label' => 'Email',
                    'name' => 'email',
                    'type' => InputTypes::email,
                ],
                [
                    'label' => 'Пароль',
                    'name' => 'password',
                    'type' => InputTypes::password,
                ],
                [
                    'label' => 'Повтор пароля',
                    'name' => 'password_repeat',
                    'type' => InputTypes::password,
                ],
            ]
        ]);

        $viewConfig->updateMeta = $this->formMetaFactory->make([
            'h2' => 'Изменение арендатора',
            'page' => 'managerLk/Form',
            'inputs' => [
                [
                    'label' => 'Имя',
                    'name' => 'name',
                    'type' => InputTypes::text,
                ],
                [
                    'label' => 'Email',
                    'name' => 'email',
                    'type' => InputTypes::email,
                ],
                [
                    'label' => 'Пароль',
                    'name' => 'password',
                    'type' => InputTypes::password,
                ],
                [
                    'label' => 'Повтор пароля',
                    'name' => 'password_repeat',
                    'type' => InputTypes::password,
                ],
            ]
        ]);

        return $viewConfig;
    }
}
