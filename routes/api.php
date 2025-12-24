<?php

use App\Http\Controllers\Api\Company\EmployeeManagerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Company\RegisterController;
use App\Http\Controllers\Api\Company\TokenController;

Route::prefix('auth')->group(function() {
    Route::prefix('company')->group(function () {
        Route::post('register', RegisterController::class)->name('register');

        Route::prefix('tokens')->name('tokens.')->group(function () {
            Route::post('/', [TokenController::class, 'store'])->name('store');

            Route::middleware(['auth:sanctum'])->group(function () {
                Route::delete('current', [TokenController::class, 'destroy'])->name('destroy');
                Route::delete('/', [TokenController::class, 'destroyAll'])->name('destroyAll');
            });
        });
    })->name('company.');
})->name('auth.');

Route::middleware(['auth:sanctum'])->prefix('company')->group(function() {
    Route::prefix('employee')->group(function() {
        Route::post('/', [EmployeeManagerController::class, 'store'])->name('store');
    })->name('employee.');
})->name('company.');
