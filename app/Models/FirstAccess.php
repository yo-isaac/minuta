<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FirstAccess extends Model
{
    protected $table = 'first_access';

    protected $fillable = [
        'employee_id',
        'company_id'
    ];
}
