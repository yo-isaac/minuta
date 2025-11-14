<?php

namespace App\Http\Repositories\Contracts;

interface FirstAccess
{
    public function create(array $data);
    public function exists(string $id);
    public function maskAsDone(string $id);
}
