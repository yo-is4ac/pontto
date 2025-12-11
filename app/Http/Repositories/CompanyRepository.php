<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Contracts\CompanyContract;
use App\Helpers\Format;
use App\Models\Company;
use Exception;

class CompanyRepository implements CompanyContract {
    public function __construct(
        private Company $company
    )
    {}

    public function store(string $legalName, string $cnpj, string $password)
    {
        try {
            $this->company->create([
                'legal_name' => $legalName,
                'cnpj' => Format::removeNonDigits($cnpj),
                'password' => $password
            ]);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
