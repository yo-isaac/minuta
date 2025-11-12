<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Hash;

class Hazh
{
    public static function checkHash(string $string, string $hash)  {
        return Hash::check($string, $hash);
    }
}
