<?php

namespace App\ManagerLk\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class RentUnitTypeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'img' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:5120', // до 5MB
            'ing_alt' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле "Название" обязательно.',
            'name.string' => 'Поле "Название" должно быть строкой.',
            'name.max' => 'Поле "Название" не должно превышать 255 символов.',

            'description.required' => 'Поле "Описание" обязательно.',
            'description.string' => 'Поле "Описание" должно быть строкой.',

            'img.file' => 'Поле "Изображение" должно быть файлом.',
            'img.mimes' => 'Разрешены только файлы форматов: JPG, JPEG, PNG, WEBP.',
            'img.max' => 'Максимальный размер изображения — 5MB.',

            'ing_alt.string' => 'Поле "Альтернативный текст" должно быть строкой.',
            'ing_alt.max' => 'Поле "Альтернативный текст" не должно превышать 255 символов.',
        ];
    }
}
