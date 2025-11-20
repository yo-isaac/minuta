<?php

namespace App\Http\Repositories\Contracts;

interface Employee
{
    public function create(array $data);
    public function getByCpf(string $cpf);
    public function exists(string $cpf): bool;
}
