<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Contracts\Company as ContractsCompany;
use App\Models\Company as ModelsCompany;
use Exception;

class Company implements ContractsCompany 
{
	public function create(array $data) 
    {
        try {
            ModelsCompany::create([
                'cnpj' => $data['cnpj'],
                'legal_name' => $data['legal_name'],
                'email' => $data['email'],
                'password' => $data['password']
            ]);
        } catch(Exception $e) {
            throw new Exception($e->getMessage(), $e->getCode());
        }
    }
}