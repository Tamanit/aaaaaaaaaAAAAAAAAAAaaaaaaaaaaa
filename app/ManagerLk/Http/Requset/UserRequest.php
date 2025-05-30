<?php

namespace App\ManagerLk\Http\Requset;

use App\Shared\Enumeration\UserRole;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'role' => [Rule::enum(UserRole::class)],
            'password' => 'required',
            'password_repeat' => 'required|same:password',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле "Имя" обязательно для заполнения.',
            'email.required' => 'Поле "Email" обязательно для заполнения.',
            'email.email' => 'Поле "Email" должно быть действительным адресом электронной почты.',
            'role' => 'Выбранная роль недопустима.',
            'password.required' => 'Поле "Пароль" обязательно для заполнения.',
            'password_repeat.required' => 'Поле "Повтор пароля" обязательно для заполнения.',
            'password_repeat.same' => 'Пароли не совпадают.',
        ];

    }

    public function authorize(): bool
    {
        return true;
    }
}
