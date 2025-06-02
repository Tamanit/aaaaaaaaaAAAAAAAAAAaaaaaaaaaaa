<?php

namespace App\ManagerLk\Http\Request;

use App\Models\Addon;
use App\Models\BookingTime;
use App\Models\Price;
use Illuminate\Foundation\Http\FormRequest;

class TariffRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',

            Price::class . '__period_in_months' => 'required|array',
            Price::class . '__period_in_months.*' => 'required|integer|min:1',

            Price::class . '__sum_in_kopeck' => 'required|array',
            Price::class . '__sum_in_kopeck.*' => 'nullable|integer|min:0',

            Addon::class . '__name' => 'required|array',
            Addon::class . '__name.*' => 'required|string|max:255',

            Addon::class . '__description' => 'required|array',
            Addon::class . '__description.*' => 'required|string|max:1000',

            BookingTime::class . '__rent_unit_type_id_id' => 'nullable|array',
            BookingTime::class . '__rent_unit_type_id_id.*' => 'nullable|exists:rent_unit_types,id',

            BookingTime::class . '__free_hours_in_month' => 'nullable|array',
            BookingTime::class . '__free_hours_in_month.*' => 'nullable|integer|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            // Основные поля
            'name.required' => 'Поле "Название тарифа" обязательно.',
            'name.string' => 'Поле "Название тарифа" должно быть строкой.',
            'name.max' => 'Поле "Название тарифа" не должно превышать 255 символов.',

            'description.required' => 'Поле "Описание тарифа" обязательно.',
            'description.string' => 'Поле "Описание тарифа" должно быть строкой.',
            'description.max' => 'Поле "Описание тарифа" не должно превышать 1000 символов.',

            // Price: period_in_months
            Price::class . '__period_in_months.required' => 'Поле "Период в месяцах" обязательно.',
            Price::class . '__period_in_months.array' => 'Поле "Период в месяцах" должно быть массивом.',
            Price::class . '__period_in_months.*.required' => 'Каждое значение "Период в месяцах" обязательно.',
            Price::class . '__period_in_months.*.integer' => 'Каждое значение "Период в месяцах" должно быть числом.',
            Price::class . '__period_in_months.*.min' => 'Период в месяцах не может быть меньше 1.',

            // Price: sum_in_kopeck
            Price::class . '__sum_in_kopeck.required' => 'Поле "Сумма (в копейках)" обязательно.',
            Price::class . '__sum_in_kopeck.array' => 'Поле "Сумма (в копейках)" должно быть массивом.',
            Price::class . '__sum_in_kopeck.*.integer' => 'Каждое значение "Сумма (в копейках)" должно быть числом.',
            Price::class . '__sum_in_kopeck.*.min' => 'Сумма (в копейках) не может быть меньше 0.',

            // Addon: name
            Addon::class . '__name.required' => 'Поле "Название услуги" обязательно.',
            Addon::class . '__name.array' => 'Поле "Название услуги" должно быть массивом.',
            Addon::class . '__name.*.required' => 'Каждое значение "Название услуги" обязательно.',
            Addon::class . '__name.*.string' => 'Название услуги должно быть строкой.',
            Addon::class . '__name.*.max' => 'Название услуги не должно превышать 255 символов.',

            // Addon: description
            Addon::class . '__description.required' => 'Поле "Описание услуги" обязательно.',
            Addon::class . '__description.array' => 'Поле "Описание услуги" должно быть массивом.',
            Addon::class . '__description.*.required' => 'Каждое значение "Описание услуги" обязательно.',
            Addon::class . '__description.*.string' => 'Описание услуги должно быть строкой.',
            Addon::class . '__description.*.max' => 'Описание услуги не должно превышать 1000 символов.',

            // BookingTime: rent_unit_type_id_id
            BookingTime::class . '__rent_unit_type_id_id.array' => 'Поле "Тип помещения" должно быть массивом.',
            BookingTime::class . '__rent_unit_type_id_id.*.exists' => 'Выбранный тип помещения не существует в базе данных.',

            // BookingTime: free_hours_in_month
            BookingTime::class . '__free_hours_in_month.array' => 'Поле "Свободные часы в месяц" должно быть массивом.',
            BookingTime::class . '__free_hours_in_month.*.integer' => 'Каждое значение "Свободные часы в месяц" должно быть числом.',
            BookingTime::class . '__free_hours_in_month.*.min' => 'Свободные часы не могут быть меньше 0.',
        ];
    }


}
