<?php

namespace App\Http\Services\Company;

use App\Helpers\Stringy;
use App\Http\Repositories\Company as Repository;
use App\Http\Requests\Company\AuthRequest as Request;

use App\Exceptions\ModelException;

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
        } catch(ModelException $e) {
            throw new ModelException($e->getMessage(), $e->getHttpCode());
        } 

        return [
            'success' => 'ok',
            'message' => 'logged',
            'http_code' => 200,
        ];
    }
}