<?php

namespace App\Http\Controllers\Company\Dashboard\Management;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\Dashboard\Management\Employee\RegisterRequest as Request;
use App\Http\Services\Company\Dashboard\Management\Employee\RegisterService as Service;
use Exception;

class EmployeeController extends Controller
{
    private Service $service; 

    public function __construct(Service $service) {
        $this->service = $service;
    }

    public function store(Request $request)
    {
        try {
            $this->service->handle($request->validated());
        } catch(Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 'failed'
            ], 500);
        }

        return response()->json([
            'message' => 'employee created successful',
            'action' => 'employee should now login-in',
            'status' => 'pending'
        ], 201);
    }
}
