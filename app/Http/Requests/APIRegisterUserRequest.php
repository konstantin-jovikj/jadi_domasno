<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class APIRegisterUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
            'role' => ['required'],
            'birth_date' => ['date', 'before:today'],
            'phone' => ['required', 'unique:users,phone'],
            'address' => ['required', 'string', 'max:255'],
            'municipality' => ['required', 'string', 'max:255'],
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
