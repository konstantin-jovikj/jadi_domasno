<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DishRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'dishname' => ['required', 'max:255'],
            'dish_image' => ['required','url'],
            'hashtag' => ['required'],
            'ingredients' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'prep_time' => ['required', 'max:255'],
            'heating_instructions' => ['required', 'max:255'],
            'portion_size' => ['required', 'max:255'],
            'price' => ['required','integer'],
            'price' => ['required','integer'],
            'promo_price' => ['nullable', 'integer'],
            'about'=> ['max:255'],
            'promo_price_date'=> ['nullable','date', 'after_or_equal:today'],
        ];
    }
}

