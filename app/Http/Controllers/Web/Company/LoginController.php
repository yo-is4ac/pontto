<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Company\LoginRequest;
use App\Services\Company\LoginService;
use Exception;

class LoginController extends Controller
{
    public function __construct(
        private LoginService $loginService
    )
    {}

    public function showLoginForm()
    {
        return view('company.login');
    }

    public function login(LoginRequest $request)
    {
        try {
            $this->loginService->store();
        } catch (Exception $e) {
            return response()->noContent(500);
        }

        $isValid = LoginService::store(request: $request);

        if ($isValid !== true) {
            $errorCode = $isValid->getCode();
            response()->noContent($errorCode);
        }

        $isSessioned = LoginService::sessionStore($request);

        if ($isSessioned === false) {
            return response()->noContent(500);
        }

        return response()->noContent(200);
    }
}
