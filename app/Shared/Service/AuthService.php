<?php

namespace App\Shared\Service;

use App\Shared\Models\User;

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
