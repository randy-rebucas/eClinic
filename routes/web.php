<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__.'/auth.php';
require __DIR__.'/public/landing.php';

require __DIR__.'/private/dashboard.php';
require __DIR__.'/private/patient.php';
require __DIR__.'/private/clinic.php';
require __DIR__.'/private/setting.php';
require __DIR__.'/private/user.php';
