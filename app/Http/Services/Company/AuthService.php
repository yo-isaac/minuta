<?php

namespace App\Http\Services\Company;

use App\Helpers\Hazh;
use App\Helpers\Stringy;
use App\Http\Repositories\Company as Repository;
use App\Http\Requests\Company\AuthRequest as Request;

use Exception;

class AuthService {
    protected Repository $repository;

    public function __construct(Repository $repository) {
        $this->repository = $repository;
    }

    public function handle(Request $request)
    {
        try {
            $company = $this->repository->getCompanyByCnpj( 
                Stringy::removeNonDigits($request['cnpj'])
            ) ?? null;

            if ($company === null) {
                return [
                    'success' => false,
                    'message' => 'Company was not found',
                    'http_code' => 404,
                ];
            }

            if (
                Hazh::checkHash($request['password'], $company->password) === false
            ) {
                return [
                    'success' => false,
                    'message' => 'Incorrect Credentials',
                    'http_code' => 401,
                ];
            }
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        } 

        return [
            'success' => 'ok',
            'message' => 'logged',
            'http_code' => 200,
        ];
    }
}