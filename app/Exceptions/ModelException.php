<?php

namespace App\Exceptions;

use Exception;

class ModelException extends Exception
{
    protected int $httpCode;

    public function __construct(string $message) {
        parent::__construct($message);
        $this->httpCode = 500;
    }

    public function getHttpCode() 
    {
        return $this->httpCode;
    }
}
