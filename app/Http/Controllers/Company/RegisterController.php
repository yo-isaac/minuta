<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\RegisterRequest as Request;
use App\Http\Services\Company\RegisterService as Service;

use Exception;

class RegisterController extends Controller
{
    private Service $service;

    public function __construct(Service $service) {
        $this->service = $service;
    }

    public function store(Request $request)
    {
        try {
            $this->service->handle($request);
        } catch(Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 'failed'
            ], 500);
        }

        return response()->json([
            'message' => 'company created!',
            'status' => 'ok'
        ], 201);
    }
}
