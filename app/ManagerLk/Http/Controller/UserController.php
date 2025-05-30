<?php

namespace App\ManagerLk\Http\Controller;

use App\ManagerLk\Http\Requset\UserRequest;
use App\ManagerLk\ViewConfigFactory\UserViewConfigFactory;
use App\Shared\Http\Controllers\RestController;
use App\Shared\Models\User;

class UserController extends RestController
{
    public static string $route = 'users';
    protected string $model = User::class;

    public function __construct(
        protected UserViewConfigFactory $userViewConfigFactory,
    ) {
        $this->createRequest = UserRequest::class;
        $this->updateRequest = UserRequest::class;
        parent::$route = 'users';
        $this->viewConfig = $this->userViewConfigFactory->fill();
        parent::__construct();
    }
}
