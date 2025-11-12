<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\AuthRequest as Request;
use App\Http\Services\Company\AuthService as Service;

use Exception;

class AuthController extends Controller
{
    private Service $service;

    public function __construct(Service $service) {
        $this->service = $service;
    }

    public function auth(Request $request) {
        try {
            $result = $this->service->handle($request);
            $status = $result['http_code'];

            return response()->json($result, $status);
        } catch(Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 'failed'
            ], 500);
        }
    }
}
