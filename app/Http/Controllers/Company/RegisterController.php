<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\RegisterRequest;
use App\Http\Services\Company\RegisterService;
use Exception;

class RegisterController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterRequest $request, RegisterService $registerService)
    {
        try {
            $company = $registerService::handle($request->validated());
        } catch(Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 'failed'
            ], $e->getCode());
        }

        return response()->json([
            'message' => 'company created!',
            'status' => 'ok'
        ], 201);
    }
}
