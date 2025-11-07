<?php

namespace App\Http\Services\Company;

use App\Http\Repositories\Company as Repository;
use App\Http\Requests\Company\RegisterRequest as Request;

use Exception;

class RegisterService {
    protected Repository $repository;

    public function __construct(Repository $repository) {
        $this->repository = $repository;
    }

    public function handle(Request $request)
    {
        try {
            $this->repository->create($request->validated());
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}