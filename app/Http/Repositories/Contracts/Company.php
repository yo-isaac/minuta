<?php

namespace App\Http\Repositories\Contracts;

interface Company
{
    public function create(array $data);
    public function getCompanyByCnpj(string $cnpj);
}