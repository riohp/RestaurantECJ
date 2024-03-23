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
     * @return array<string, string|array>
     */
    public function rules(): array
    {
        $userId = $this->route('user') ? $this->route('user')->id : null;
        $rules = [
            'name' => 'required|max:255|min:3',
            'cellphone' => [
                'required',
                'digits:10',
            ],
            'address' => 'required|max:255|min:3',
            'role' => 'required|in:admin,cashier,waiter,client',
            'status' => 'required|in:0,1',
        ];

        // Verificar si el usuario está autenticado
        if ($this->user()) {
            // Solo si el usuario está autenticado, se aplican las siguientes reglas de validación
            if ($this->isMethod('put') && $this->has('email')) {
                $rules['email'] = [
                    'required',
                    'email',
                    Rule::unique('users', 'email')->ignore($userId),
                ];
            }

            if ($this->isMethod('put')) {
                $rules = array_merge($rules, [
                    'password' => 'nullable|min:8',
                    'role' => 'nullable|in:admin,cashier,waiter,client',
                    'status' => 'nullable|in:0,1',
                ]);
            } else {
                $rules = array_merge($rules, [
                    'password' => 'required|min:8',
                    'email' => 'required|email|unique:users,email',
                ]);
            }
        }

        if ($this->isMethod('post')) {
            $rules = array_merge($rules, [
                'password' => 'required|min:8',
                'email' => 'required|email|unique:users,email',
            ]);
        }

        return $rules;
    }
}
