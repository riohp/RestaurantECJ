<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|max:255|min:3',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($this->route('user')), 
            ],
            'cellphone' => [
                'required',
                'digits:10',
            ],
            'address' => 'required|max:255|min:3',
            'password' => 'required|min:8',
        ];

        return $rules;

    }
}
