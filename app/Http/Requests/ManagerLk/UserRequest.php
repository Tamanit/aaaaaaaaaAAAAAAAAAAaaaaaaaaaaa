<?php

namespace App\Http\Requests\ManagerLk;

use App\Enumeration\UserRole;
use App\Http\Rules\ForbiddenRoleWithoutOrganization;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'organization_id' => 'present|exists:organizations,id|nullable',
            'role' => [
                Rule::enum(UserRole::class),
                new ForbiddenRoleWithoutOrganization([
                    UserRole::TenantRentOrganizationWorker,
                    UserRole::TenantOrganizationAdministrator,
                ]),
            ],
            'password' => 'nullable',
            'password_repeat' => 'nullable|same:password',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле "Имя" обязательно для заполнения.',

            'email.required' => 'Поле "Email" обязательно для заполнения.',
            'email.email' => 'Поле "Email" должно быть действительным адресом электронной почты.',

            'organization_id.present' => 'Поле "Организация" должно присутствовать в запросе (может быть пустым).',
            'organization_id.exists' => 'Выбранная организация не найдена в системе.',
            'organization_id.nullable' => 'Поле "Организация" может быть пустым.',

            'role.required' => 'Поле "Роль" обязательно для заполнения.',
            'role.enum' => 'Указанная роль недопустима.',
            'password_repeat.same' => 'Поле "Повтор пароля" должно совпадать с полем "Пароль".',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
