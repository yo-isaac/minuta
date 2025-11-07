<?php

namespace App\Http\Services\Company;

use App\Http\Repositories\Company as RepositoriesCompany;
use App\Http\Requests\Company\RegisterRequest;
use Exception;

class RegisterService {
    protected RepositoriesCompany $repository;

    public function __construct(RepositoriesCompany $repository) {
        $this->repository = $repository;
    }

    public static function handle(RegisterRequest $request)
    {
        try {
            self::$repository->create($request->validated());
        } catch (Exception $e) {
            throw new Exception($e->getMessage(), $e->getCode());
        }
    }
}