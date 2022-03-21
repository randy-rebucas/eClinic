<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::post('/users/store', [UserController::class, 'store'])
        ->name('user.store');

    Route::put('/users/{id}', [UserController::class, 'update'])
        ->name('user.update');

    Route::delete('/users/{id}', [UserController::class, 'destroy'])
        ->name('user.destroy');
});

