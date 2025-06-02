<?php

namespace App\Http\Requests\TenantLk;


use App\Enumeration\BookingStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'rent_unit_id' => ['required', 'exists:rent_units,id'],
            'book_at' => ['required', 'date'],
            'book_until' => ['required', 'date', 'after_or_equal:book_at'],
            'time_in_minutes' => ['required', 'integer', 'min:1'],
            'status' => ['required', Rule::enum(BookingStatus::class)],
        ];
    }

    public function messages(): array
    {
        return [
            'rent_unit_id.required' => 'Необходимо выбрать единицу аренды.',
            'rent_unit_id.exists' => 'Выбранная единица аренды не найдена.',
            'book_at.required' => 'Укажите дату начала бронирования.',
            'book_at.date' => 'Неверный формат даты начала бронирования.',
            'book_until.required' => 'Укажите дату окончания бронирования.',
            'book_until.date' => 'Неверный формат даты окончания.',
            'book_until.after_or_equal' => 'Дата окончания должна быть позже или равна началу.',
            'time_in_minutes.required' => 'Укажите длительность бронирования в минутах.',
            'time_in_minutes.integer' => 'Длительность должна быть числом.',
            'time_in_minutes.min' => 'Длительность должна быть больше 0.',
            'status.required' => 'Необходимо выбрать статус бронирования.',
            'status.enum' => 'Указан недопустимый статус бронирования.',
        ];
    }
}
