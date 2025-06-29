<?php

namespace App\Http\ViewConfigFactories\ManagerLk;

use App\Dto\FormDto\Factory\FormMetaFactory;
use App\Dto\IndexDto\Factory\IndexMetaFactory;
use App\Enumeration\InputTypes;
use App\Enumeration\UserRole;
use App\Http\ViewConfing\ViewConfig;
use App\Models\Organization;
use App\Models\User;

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

        $organisationTable = app(Organization::class)->getTable();
        $userTable = app(User::class)->getTable();

        $viewConfig->indexMeta = $this->indexMetaFactory->make([
            'h2' => 'Арендаторы',
            'page' => 'managerLk/Index',
            'columns' => [
                [$userTable . '.id' => 'id'],
                [$userTable . '.name' => 'name'],
                [$userTable . '.email' => 'email'],
                [$userTable . '.role' => 'Роль'],
                [$organisationTable . '.full_name' => 'Организация']
            ],
            'leftJoins' => [
                [
                    'table' => $organisationTable,
                    'foreignKey' => 'organization_id',
                ],
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
                    'label' => 'Организация',
                    'name' => 'organization_id',
                    'type' => InputTypes::select,
                    'options' => Organization::select('id as id', 'full_name as value')->get()->prepend(
                        ['id' => '', 'value' => 'Не задано']
                    )->toArray(),
                ],
                [
                    'label' => 'Роль',
                    'name' => 'role',
                    'type' => InputTypes::select,
                    'options' => UserRole::toArray(),
                ],
                [
                    'label' => 'Пароль',
                    'name' => 'password',
                    'type' => InputTypes::password,
                    'vanishValue' => true,
                ],
                [
                    'label' => 'Повтор пароля',
                    'name' => 'password_repeat',
                    'type' => InputTypes::password,
                    'vanishValue' => true,
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
                    'label' => 'Организация',
                    'name' => 'organization_id',
                    'type' => InputTypes::select,
                    'options' => Organization::select('id as id', 'full_name as value')->get()->prepend(
                        ['id' => '', 'value' => 'Не задано']
                    )->toArray(),
                ],
                [
                    'label' => 'Роль',
                    'name' => 'role',
                    'type' => InputTypes::select,
                    'options' => UserRole::toArray(),
                ],
                [
                    'label' => 'Пароль',
                    'name' => 'password',
                    'type' => InputTypes::password,
                    'vanishValue' => true,
                ],
                [
                    'label' => 'Повтор пароля',
                    'name' => 'password_repeat',
                    'type' => InputTypes::password,
                    'vanishValue' => true,
                ],
            ]
        ]);

        return $viewConfig;
    }
}
