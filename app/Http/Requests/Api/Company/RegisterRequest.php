<?php

namespace App\Http\Requests\Api\Company;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'legal_name' => 'required|string|max:128',
            'cnpj' => 'required|string|regex:/^\d{2}.\d{3}.\d{3}\/\d{4}-\d{2}$/',
            'email' => 'required|string|email|max:64',
            'password' => 'required|string|min:8|max:16'
        ];
    }
}
