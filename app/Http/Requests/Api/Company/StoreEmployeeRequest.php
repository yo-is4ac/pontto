<?php

namespace App\Http\Requests\Api\Company;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'company_id' => 'required|integer',
            'name' => 'required|string|max:128',
            'cpf' => 'required|string|regex:/^\d{3}.\d{3}.\d{3}-\d{2}$/',
            'phone' => 'required|string',
            'email' => 'required|string|email|max:64',
            'role' => 'required|string|max:128',
        ];
    }
}
