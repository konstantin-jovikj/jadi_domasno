<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            // 'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'surname' => ['required', 'string', 'max:255'],
            'birth_date' => ['date', 'before:today'],
            'phone' => ['required'],
            'address' => ['required', 'string', 'max:255'],
            'municipality_id' => ['required', 'max:255'],
            'profile_img_url' => ['url'],
            'about'=> ['max:255'],
            'other'=> ['max:255'],
        ];
    }
}
