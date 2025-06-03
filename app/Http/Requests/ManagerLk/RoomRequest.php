<?php

namespace App\Http\Requests\ManagerLk;

use App\Enumeration\RoomStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoomRequest extends FormRequest
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
            'status' => [Rule::enum(RoomStatus::class)],
            'inventory' => 'nullable|array',
            'inventory.*' => 'required|string',
            'img' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:5120', // до 5MB
            'img_alt' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле "Название" обязательно.',
            'name.string' => 'Поле "Название" должно быть строкой.',
            'description.required' => 'Поле "Описание" обязательно.',
            'description.string' => 'Поле "Описание" должно быть строкой.',
            'status' => 'Выберите статус комнаты.',
            'img.file' => 'Поле "Изображение" должно быть файлом.',
            'img.mimes' => 'Разрешены только файлы форматов: JPG, JPEG, PNG, WEBP.',
            'img.max' => 'Максимальный размер изображения — 5MB.',

            'img_alt.string' => 'Поле "Альтернативный текст" должно быть строкой.',
            'img_alt.max' => 'Поле "Альтернативный текст" не должно превышать 255 символов.',
        ];
    }
}
