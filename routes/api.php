<?php

use App\Http\Controllers\Api\AppointmentController;
use Illuminate\Support\Facades\Route;

Route::get('/appointments', [AppointmentController::class, 'index']);    // opsional, biasanya untuk admin app
Route::post('/appointments', [AppointmentController::class, 'store']);   // ini buat form dari frontend!
