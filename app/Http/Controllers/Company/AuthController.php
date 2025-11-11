<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\AuthRequest as Request;
use App\Http\Services\Company\AuthService as Service;

use App\Exceptions\ModelException;

class AuthController extends Controller
{
    private Service $service;

    public function __construct(Service $service) {
        $this->service = $service;
    }

    public function auth(Request $request) {
        try {
            $result = $this->service->handle($request);
            $status = $result['http_code'] ?? 200;

            return response()->json($result, $status);
        } catch(ModelException $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 'failed'
            ], $e->getHttpCode());
        }
    }
}
