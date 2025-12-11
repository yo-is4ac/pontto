<?php

namespace App\Http\Requests\Company;

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
            "legalName" =>
                "required|string",
            "cnpj" =>
                "required|string|size:18|regex:/^\d{2}.\d{3}.\d{3}\/\d{4}-\d{2}$/",
            "password" =>
                "required|string"
        ];
    }
}
