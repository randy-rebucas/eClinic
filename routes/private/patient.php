<?php

use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/patients', [PatientController::class, 'index'])
        ->name('patients');

    Route::get('/patients/create', [PatientController::class, 'create'])
        ->name('patient.create');

    Route::get('/patients/{id}/show', [PatientController::class, 'show'])
        ->name('patient.show');

    Route::get('/patients/{id}/edit', [PatientController::class, 'edit'])
        ->name('patient.edit');

    Route::post('/patients/store', [PatientController::class, 'store'])
        ->name('patient.store');

    Route::put('/patients/{id}', [PatientController::class, 'update'])
        ->name('patient.update');

    Route::delete('/patients/{id}', [PatientController::class, 'destroy'])
        ->name('patient.destroy');

    Route::post('/patients/cities', [PatientController::class, 'getCities'])
        ->withoutMiddleware('auth')
        ->name('patient.getCities');
});

