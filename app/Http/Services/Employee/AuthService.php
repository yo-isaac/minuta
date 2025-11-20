<?php

namespace App\Http\Services\Employee;

use App\Helpers\Hazh;
use Exception;
use App\Http\Repositories\Employee as EmployeeRepository;
use App\Http\Repositories\FirstAccess as FirstAccessRepository;

class AuthService
{
    private EmployeeRepository $employeeRepository;
    private FirstAccessRepository $firstAccessRepository;

    public function __construct(
        EmployeeRepository $employeeRepository,
        FirstAccessRepository $firstAccessRepository)
     {
        $this->firstAccessRepository = $firstAccessRepository;
        $this->employeeRepository = $employeeRepository;
    }   

    public function handle(string $cpf, string $password) {
        $cpf = preg_replace('/\D/', '', $cpf);

        if ($this->employeeRepository->exists($cpf) === false) {
            throw new Exception('Employee not found.', 404);
        }

        $employee = $this->employeeRepository->getByCpf($cpf);

        if ($this->firstAccessRepository->exists($employee->id)) {
            throw new Exception('First access not completed.', 403);
        }
    }

    public function changePassword(string $cpf, string $password, string $newPassword) {
        $cpf = preg_replace('/\D/', '', $cpf);

        $employee = $this->employeeRepository->getByCpf($cpf);

        if (Hazh::checkHash($password, $employee->password) === false) {
            throw new Exception('Current password is incorrect.', 401);
        }

        $this->firstAccessRepository->maskAsDone($employee->id);
    }
}
