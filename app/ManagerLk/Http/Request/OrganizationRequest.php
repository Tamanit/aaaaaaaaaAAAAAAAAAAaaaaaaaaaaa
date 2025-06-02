<?php

namespace App\ManagerLk\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class OrganizationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'full_name' => 'required|string|max:255',
            'ur_address' => 'required|string|max:255',
            'post_address' => 'required|string|max:255',
            'bank' => 'required|string|max:255',
            'inn' => 'required|digits:10',
            'kpp' => 'required|digits:9',
            'bank_account' => 'required|digits:20',
            'bank_corr_account' => 'required|digits:20',
            'bik' => 'required|digits:9',
            'okpo' => 'required|digits_between:8,10',
        ];
    }

    public function messages(): array
    {
        return [
            'full_name.required' => 'Поле "Полное название организации" обязательно.',
            'ur_address.required' => 'Поле "Юридический адрес" обязательно.',
            'post_address.required' => 'Поле "Почтовый адрес" обязательно.',
            'bank.required' => 'Поле "Банк" обязательно.',
            'inn.required' => 'Поле "ИНН" обязательно.',
            'inn.digits' => 'Поле "ИНН" должно содержать 10.',
            'kpp.required' => 'Поле "КПП" обязательно.',
            'kpp.digits' => 'Поле "КПП" должно содержать 9 цифр.',
            'bank_account.required' => 'Поле "Расчётный счёт" обязательно.',
            'bank_account.digits' => 'Поле "Расчётный счёт" должно содержать 20 цифр.',
            'bank_corr_account.required' => 'Поле "Корреспондентский счёт" обязательно.',
            'bank_corr_account.digits' => 'Поле "Корреспондентский счёт" должно содержать 20 цифр.',
            'bik.required' => 'Поле "БИК" обязательно.',
            'bik.digits' => 'Поле "БИК" должно содержать 9 цифр.',
            'okpo.required' => 'Поле "ОКПО" обязательно.',
            'okpo.digits_between' => 'Поле "ОКПО" должно содержать от 8 до 10 цифр.',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
