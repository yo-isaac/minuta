<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Company\RegisterController as RegisterCompany;
use App\Http\Controllers\Company\AuthController as AuthCompany;

Route::prefix('company')->group(function() {
    Route::prefix('register')->group(function() {
        Route::post('/', [RegisterCompany::class, 'store']);
    });
    
    Route::prefix('auth')->group(function() {
        Route::post('/', [AuthCompany::class, 'auth']);
    });
}); 