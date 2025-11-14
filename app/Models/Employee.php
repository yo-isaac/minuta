<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';

    protected $fillable = [
        'cpf',
        'name',
        'email',
        'password',
        'role',
        'company_id'
    ];
}
