<?php

namespace App\Http\Services\Company\Dashboard\Management\Employee;

use App\Http\Repositories\FirstAccess as Repository;

class FirstAccessService
{
    private Repository $repository;

    public function __construct(
        Repository $repository,
        
    ) {
        $this->repository = $repository;
    }

    public function add(int $employeeId, int $companyId) {
        $this->repository->create([
            'employee_id' => $employeeId,
            'company_id' => $companyId
        ]);
    }
}
