<?php

namespace App\Http\Services\Company\Dashboard\Management\Employee;

use Exception;

class RegisterService
{
    public function __construct() {

    }

    public function handle() 
    {
        try {

        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
