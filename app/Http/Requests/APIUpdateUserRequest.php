<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class APIUpdateUserRequest extends FormRequest
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
            'name' => ['string', 'max:255'],
            'surname' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255', 'unique:users,email,' . auth()->id()],
            'password' => ['confirmed', Password::defaults()],
            'role' => ['required'],
            'birth_date' => ['before:today'],
            'phone' => ['unique:users,phone,' . auth()->id()],
            'address' => ['string', 'max:255'],
            'municipality' => ['string', 'max:255'],
            'profile_img_url' => ['url'],
            'about'=> ['max:255'],
            'other'=> ['max:255'],
            'delivery_instructions' => ['max:255'],
            'web' => ['url', 'nullable'],
            'facebook' => ['url', 'nullable'],
            'instagram' => ['url', 'nullable'],
        ];
    }
}
