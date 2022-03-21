<?php

use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/settings', [SettingController::class, 'index'])
        ->name('settings');

    Route::post('/settings/store', [SettingController::class, 'store'])
        ->name('setting.store');

    Route::put('/settings/{id}', [SettingController::class, 'update'])
        ->name('setting.update');
});

