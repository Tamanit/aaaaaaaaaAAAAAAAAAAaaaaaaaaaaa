<?php

namespace App\Http\Requests\ManagerLk;

use Illuminate\Foundation\Http\FormRequest;

class RoomInventoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Пожалуйста, укажите название инвентаря.',
            'name.string'   => 'Название инвентаря должно быть строкой.',
            'name.max'      => 'Название не должно превышать 255 символов.',
        ];
    }
}
