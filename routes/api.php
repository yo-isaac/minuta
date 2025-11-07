<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Company\RegisterController as RegisterCompany;

Route::prefix('company')->group(function() {
    Route::post('/', [RegisterCompany::class, 'store']);
}); 