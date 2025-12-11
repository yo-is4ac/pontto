<?php

namespace App\Http\Repositories\Contracts;

interface CompanyContract {
    public function store(string $legalName, string $cnpj, string $password);
}
