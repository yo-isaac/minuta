<?php

namespace App\Http\Services\Company\Dashboard\Management\Employee;

use Illuminate\Support\Str;
use App\Http\Repositories\Employee as Repository;
use App\Http\Services\Company\Dashboard\Management\Employee\MailService as Mail;
use App\Http\Services\Company\Dashboard\Management\Employee\FirstAccessService as Service;

use App\Helpers\Stringy;
use Exception;

class RegisterService
{
    private Repository $repository;
    private Service $service;
    private Mail $mail;

    public function __construct(
        Repository $repository,
        Service $service,
        Mail $mail
    )
    {
        $this->repository = $repository;
        $this->service = $service;
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
            $this->service->add(
                (
                    $this->repository->getByCpf(
                        Stringy::removeNonDigits($data['cpf'])
                    )
                )->id, 
                $data['company_id']);
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    private function getRandomPassword(){
        return substr(Str::uuid(), 0, 8);
    }
}
