<?php

namespace App\Http\Services\Company;
use App\Http\Repositories\CompanyRepository;
use Exception;

class RegisterService {
    public function __construct(
        private CompanyRepository $companyRepository
    )
    {}

    public function store(array $data)
    {
        try {
            $this->companyRepository->store(
                legalName: $data['legal_name'],
                cnpj: $data['cnpj'],
                password: $data['password']
            );
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
