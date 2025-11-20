<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Contracts\FirstAccess as Contract;
use App\Models\FirstAccess as Model;
use Exception;

class FirstAccess implements Contract
{
    private Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

	public function create(array $data) 
    {
        try {
            $this->model->create([
                'employee_id' => $data['employee_id'],
                'company_id' => $data['company_id']
            ]);
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

	public function exists(string $id) 
    {
        try {
            return $this->model->where('employee_id', '=', $id)->exists();
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

	public function maskAsDone(string $id) 
    {
        try {
            $this->model->where('employee_id', '=', $id)->update(['status' => 'DONE']);
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function getByEmployeeId(string $id) 
    {
        try {
            return $this->model->where('employee_id', '=', $id)->first();
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
