<?php

use App\Http\Controllers\ClinicController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/clinics', [ClinicController::class, 'index'])
        ->name('clinics');

    Route::get('/clinics/create', [ClinicController::class, 'create'])
        ->name('clinic.create');

    Route::get('/clinics/{id}/show', [ClinicController::class, 'show'])
        ->name('clinic.show');

    Route::get('/clinics/{id}/edit', [ClinicController::class, 'edit'])
        ->name('clinic.edit');

    Route::post('/clinics/store', [ClinicController::class, 'store'])
        ->name('clinic.store');

    Route::put('/clinics/{id}', [ClinicController::class, 'update'])
        ->name('clinic.update');

    Route::delete('/clinics/{id}', [ClinicController::class, 'destroy'])
        ->name('clinic.destroy');
});

