<?php

namespace App\Http\Repositories;

use App\Helpers\Stringy;
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
                'cpf' => Stringy::removeNonDigits($data['cpf']),
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => $data['role'],
                'company_id' => $data['company_id']
            ]);
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        } 
    }

	public function getByCpf(string $cpf) 
    {
        try {
            return $this->model->where('cpf', '=', $cpf)->first();
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

	public function exists(string $cpf): bool 
    {
        try {
            return $this->model->where('cpf', '=', $cpf)->exists();
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}