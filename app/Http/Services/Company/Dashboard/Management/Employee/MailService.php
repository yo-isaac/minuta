<?php

namespace App\Http\Services\Company\Dashboard\Management\Employee;

use App\Mail\Credential;
use Exception;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public function sendCredential(
        string $cpf,
        string $name,
        string $email,
        string $password
    ) {
        try {
            Mail::to($email)->send(new Credential(
                $name,
                $cpf,
                $password
            ));
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
