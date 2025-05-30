<?php

namespace App\ManagerLk\Http\Controller;

use App\Shared\Dto\FormDto\Factory\FormMetaFactory;
use App\Shared\Dto\IndexDto\Factory\IndexMetaFactory;
use App\Shared\Enumeration\InputTypes;
use App\Shared\Http\Controllers\RestController;
use App\Shared\Models\User;

class UserController extends RestController
{
    public static string $route = 'users';
    protected string $model = User::class;

    public function __construct(
        protected IndexMetaFactory $indexMetaFactory,
        protected FormMetaFactory $formMetaFactory,
    ) {
        $this->indexMeta = $this->indexMetaFactory->make([
            'columns' => [
                ['id' => 'id'],
                ['name' => 'name'],
                ['email' => 'email'],
            ]
        ]);
        $this->createMeta = $this->formMetaFactory->make([
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
        parent::__construct();
    }
}
