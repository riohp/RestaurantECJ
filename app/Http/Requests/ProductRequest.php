<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        if ($this->isMethod('put')) {
            return [
                'name' => 'required|max:255',
                'price' => 'required|numeric',
                'cost' => 'required|numeric',
                'category_id' => 'required|integer',
                'status' => 'required|integer|between:0,1',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            ];
        }

        return [
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'cost' => 'required|numeric',
            'category_id' => 'required|integer',
            'status' => 'required|integer|between:0,1',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ];
    }
}
