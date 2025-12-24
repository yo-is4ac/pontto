<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Company\RegisterRequest;
use App\Http\Resources\Api\CompanyResource;
use App\Models\Company;

class RegisterController extends Controller
{
    public function __construct() {}

    public function __invoke(RegisterRequest $request)
    {
        $company = Company::create([
            'legal_name' => $request->input('legal_name'),
            'cnpj' => $request->input('cnpj'),
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);

        $token = $company->createToken('auth');

        return response()->json([
            'token' => $token->plainTextToken,
            'user' =>  new CompanyResource($company)
        ], 201);
    }
}
