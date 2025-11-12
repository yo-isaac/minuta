<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Company\RegisterController as RegisterCompany;
use App\Http\Controllers\Company\AuthController as AuthCompany;

use App\Http\Controllers\Company\Dashboard\Management\EmployeeController as EmployeeManagementController;

Route::prefix('company')->group(function() {
    Route::prefix('register')->group(function() {
        Route::post('/', [RegisterCompany::class, 'store']);
    });
    
    Route::prefix('auth')->group(function() {
        Route::post('/', [AuthCompany::class, 'auth']);
    });

    Route::prefix('dashboard')->group(function() {
        Route::prefix('management')->group(function() {
            Route::prefix('employee')->group(function() {
                Route::post('/', [EmployeeManagementController::class, 'store']);
            });
        });
    });
}); 