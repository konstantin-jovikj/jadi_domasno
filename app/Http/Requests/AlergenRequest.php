<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlergenRequest extends FormRequest
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
            'alergen_name' => ['required', 'unique:alergens,alergen_name','min:3'],
        ];
    }
}
