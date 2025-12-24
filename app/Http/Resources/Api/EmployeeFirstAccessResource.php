<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Crypt;

class EmployeeFirstAccessResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'company_id' => $this->company_id,
            'name' => $this->name,
            'cpf' => $this->cpf,
            'phone' => $this->phone,
            'email' => $this->email,
            'role' => $this->role,
            'password' => Crypt::decryptString($this->password)
        ];
    }
}
