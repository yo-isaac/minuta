<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Contracts\Company as Contract;
use App\Models\Company as Model;
use Exception;

class Company implements Contract
{
	public function create(array $data) 
    {
        try {
            Model::create([
                'cnpj' => preg_replace('/\D/', '', $data['cnpj']),
                'legal_name' => $data['legal_name'],
                'email' => $data['email'],
                'password' => $data['password']
            ]);
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}