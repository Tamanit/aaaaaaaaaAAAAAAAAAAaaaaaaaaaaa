<?php

namespace App\ManagerLk\Http\Controller;

use App\ManagerLk\Http\Request\UserRequest;
use App\Models\User;
use App\RentLk\ViewConfigFactory\UserViewConfigFactory;
use App\Shared\Http\Controllers\RestController;

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
