<?php

namespace App\Http\Controllers\ManagerLk;

use App\Http\Controllers\RestController;
use App\Http\Requests\ManagerLk\UserRequest;
use App\Http\ViewConfigFactories\ManagerLk\UserViewConfigFactory;
use App\Models\User;

class UserController extends RestController
{
    public static string $route = 'mg/users';
    protected string $model = User::class;

    public function __construct(
        protected UserViewConfigFactory $userViewConfigFactory,
    ) {
        $this->createRequest = UserRequest::class;
        $this->updateRequest = UserRequest::class;
        parent::$route = self::$route;
        $this->viewConfig = $this->userViewConfigFactory->fill();
        parent::__construct();
    }
}
