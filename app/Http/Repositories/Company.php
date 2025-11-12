<?php

namespace App\Http\Repositories;

use Exception;
use App\Models\Company as Model;

use Illuminate\Support\Facades\Hash;
use App\Http\Repositories\Contracts\Company as Contract;

class Company implements Contract
{
    private Model $model;

    public function __construct(Model $model) {
        $this->model = $model;
    }

	public function create(array $data) 
    {
        try {
            $this->model->create([
                'cnpj' => preg_replace('/\D/', '', $data['cnpj']),
                'legal_name' => $data['legal_name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password'])
            ]);
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

	public function getCompanyByCnpj(string $cnpj) 
    {
        try {
            return $this->model->where('cnpj', '=', $cnpj)->first();
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}