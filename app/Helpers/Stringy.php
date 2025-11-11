<?php

namespace App\Helpers;

class Stringy
{
    /**
     * Return just the digits present in a given string 
     */    
    public static function removeNonDigits(string $string) {
       return preg_replace('/\D/', '', $string); 
    }
}
