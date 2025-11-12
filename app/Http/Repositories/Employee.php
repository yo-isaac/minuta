<?php

namespace App\Http\Repositories;

use Exception;
use App\Models\Employee as Model;
use App\Http\Repositories\Contracts\Employee as Contract;
use Illuminate\Support\Facades\Hash;

class Employee implements Contract
{
    private Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create(array $data) {
        try {
            $this->model->create([
                'cpf' => preg_replace('/\D/', '', $data['cnpj']),
                'name' => $data['legal_name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => $data['role']
            ]);
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        } 
    }
}