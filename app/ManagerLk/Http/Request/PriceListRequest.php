<?php

namespace App\ManagerLk\Http\Request;

use App\Models\Tariff;
use Illuminate\Foundation\Http\FormRequest;

class PriceListRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            Tariff::class . '__price_list_id__name' => 'array|required',
            Tariff::class . '__price_list_id__name.*' => 'required|string',
            Tariff::class . '__price_list_id__description' => 'array|required',
            Tariff::class . '__price_list_id__description.*' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            Tariff::class . '__price_list_id__name.required' => 'Каждое название в списке обязательно для заполнения.',
            Tariff::class . '__price_list_id__name.array' => 'Поле "Название (массив)" должно быть массивом.',
            Tariff::class . '__price_list_id__name.*.required' => 'Каждое название в списке обязательно для заполнения.',
            Tariff::class . '__price_list_id__name.*.string' => 'Каждое название в списке должно быть строкой.',

            Tariff::class . '__price_list_id__description.required' => 'Каждое название в списке обязательно для заполнения.',
            Tariff::class . '__price_list_id__description.array' => 'Поле "Описание (массив)" должно быть массивом.',
            Tariff::class . '__price_list_id__description.*.required' => 'Каждое описание в списке обязательно для заполнения.',
            Tariff::class . '__price_list_id__description.*.string' => 'Каждое описание в списке должно быть строкой.',
        ];
    }
}

