<?php

namespace App\Exceptions;

use Exception;

class AuthException extends Exception
{
    protected int $httpCode;

    public function __construct(string $message, int $httpCode) {
        parent::__construct($message);
        $this->httpCode = $httpCode;
    }

    public function getHttpCode() {
        return $this->httpCode;
    }
}
