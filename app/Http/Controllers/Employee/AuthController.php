<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;

use App\Http\Requests\Employee\AuthRequest;
use App\Http\Services\Employee\AuthService;

use App\Http\Requests\Employee\PasswordResetRequest;

use Exception;

class AuthController extends Controller
{
    private AuthService $authService;

    public function __construct(AuthService $authService) {
        $this->authService = $authService;
    }

    public function auth (AuthRequest $request) {
        try {
            $this->authService->handle($request->validated('cpf'), $request->validated('password'));

            return response()->json([
                'status' => 'success',
                'message' => 'Authentication successful.',
                'http_code' => 200
            ], 200);
        } catch(Exception $e) {
            return response()->json(['error' => $e->getMessage(), 'http_code' => $e->getCode()], $e->getCode());
        }
    }

    public function changePassword(PasswordResetRequest $request) {
        try {
            $this->authService->changePassword(
                $request->validated('cpf'),
                $request->validated('password'),
                $request->validated('new_password')
            );

            return response()->json([
                'status' => 'success',
                'message' => 'Password changed successfully.',
                'http_code' => 200
            ], 200);
        } catch(Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'http_code' =>  $e->getCode()
            ], $e->getCode());
        }
    }
}
