<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TableRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
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
        return [
            'name' => 'required|max:255|min:3',
            'capaciodad' => 'required|integer|min:1',
            'location' => 'required|max:255|min:3',
            'status' => 'required|integer|between:0,1|min:3',
        ];
    }
}
