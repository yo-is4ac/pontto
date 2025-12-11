<?php

namespace App\Http\Controllers\Web\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\RegisterRequest;
use App\Http\Services\Company\RegisterService;
use Exception;

class RegisterController extends Controller
{
    public function __construct(
        private RegisterService $registerService
    )
    {}

    public function create()
    {
        return view('company.register');
    }

    public function store(RegisterRequest $request)
    {
        try {
            $this->registerService->store($request->validated());
        } catch (Exception $e) {
            return response()->noContent(500);
        }

        return response()->noContent(201);
    }
}
