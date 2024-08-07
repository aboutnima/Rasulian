<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::prefix('insurance')
    ->name('insurance.')
    ->controller(Controllers\InsuranceController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
    });
