<?php

namespace App\Http\Services\Company\Dashboard\Management\Employee;

use Exception;

use Illuminate\Support\Str;
use App\Http\Repositories\Employee as Repository;
use App\Http\Services\Company\Dashboard\Management\Employee\MailService as Mail;

class RegisterService
{
    private Repository $repository;
    private Mail $mail;

    public function __construct(
        Repository $repository,
        Mail $mail
    )
    {
        $this->repository = $repository;
        $this->mail = $mail;
    }

    public function handle(array $data) 
    {
        try {
            $randomPassword = $this->getRandomPassword();

            $this->mail->sendCredential(
                email: $data['email'],
                name: $data['name'],
                cpf: $data['cpf'],
                password: $randomPassword
            );

            $this->repository->create($data);
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    private function getRandomPassword(){
        return substr(Str::uuid(), 0, 8);
    }
}
