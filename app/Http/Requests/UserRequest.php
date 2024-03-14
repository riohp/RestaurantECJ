<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255|min:3',
            'email' => 'required|email|unique:users,email',
            'cellphone' => 'required|numeric|max:10',
            'address' => 'required|max:255|min:3',
            'role' => 'required|in:admin,cashier,waiter,client',
            'password' => 'required|min:8',

        ];
    }
}
