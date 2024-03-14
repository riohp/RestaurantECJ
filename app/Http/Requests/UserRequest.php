<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true; 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, 
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
                Rule::unique('users', 'cellphone')->ignore($this->route('user')), 
            ],
            'address' => 'required|max:255|min:3',
            'password' => 'nullable|min:8',
            'role' => 'required|in:admin,cashier,waiter,client',
            'status' => 'required|in:0,1',
        ];

        // Si es una solicitud de actualización, agregar la regla de validación para el campo 'id'
        if ($this->isMethod('PUT') || $this->isMethod('PATCH')) {
            $rules['id'] = 'required|exists:users,id';
        }

        return $rules;
    }
}