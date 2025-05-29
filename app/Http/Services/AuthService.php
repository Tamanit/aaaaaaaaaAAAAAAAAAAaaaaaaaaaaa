<?php

namespace App\Http\Services;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;

class AuthService
{
    public function login(array $request)
    {

    }

    public function checkUser(array $requset) {
        $user = User::where('email', $requset['email'])->first();

        if (!$user) {
            throw new \Exception('Пользователь не найден');
        }
    }
}
