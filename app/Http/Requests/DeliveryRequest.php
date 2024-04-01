<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeliveryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'cellphone' => 'required|digits:10',
            'address' => 'required',
            'client_id' => 'required',
        ];

        if ($this->isMethod('PUT')) {
            // Si el método es PUT, agregamos la regla para 'status'
            $rules['status'] = 'required';
        }

        return $rules;
    }
}
