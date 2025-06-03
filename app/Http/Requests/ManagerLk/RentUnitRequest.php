<?php

namespace App\Http\Requests\ManagerLk;

use Illuminate\Foundation\Http\FormRequest;

class RentUnitRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'code' => 'required|string|max:255',
            'type_id' => 'required|exists:rent_unit_types,id',
        ];
    }

    public function messages(): array
    {
        return [
            'code.string' => 'Поле "Код" должно быть строкой.',
            'code.max' => 'Поле "Код" не должно превышать 255 символов.',
            'code.required' => 'Обязательно для заполнения',
            'type_id.required' => 'Поле "Тип помещения" обязательно для заполнения.',
            'type_id.exists' => 'Указанный тип помещения не найден.',
        ];
    }
}
