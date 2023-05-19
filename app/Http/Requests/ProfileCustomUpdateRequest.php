<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProfileCustomUpdateRequest extends FormRequest
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
            'name' => ['required', 'max:255'],
            // 'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'email' => ['email'],

            'surname' => ['required', 'max:255'],
            'birth_date' => ['date', 'before:today'],
            'phone' => ['required'],
            'address' => ['required', 'max:255'],

            'profile_img_url' => ['url'],
            'about'=> ['max:255'],
            'other'=> ['max:255'],
            'delivery_instructions' => ['max:255'],
            'web' => ['url','nullable'],
            'facebook' => ['url', 'nullable'],
            'instagram' => ['url','nullable'],


        ];
    }
}
