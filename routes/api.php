<?php

use App\Http\Controllers\Api\AppointmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProjectController;

Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{id}', [ProjectController::class, 'show']);
Route::post('/projects', [ProjectController::class, 'store']);
Route::put('/projects/{id}', [ProjectController::class, 'update']);
Route::patch('/projects/{id}', [ProjectController::class, 'update']);
Route::delete('/projects/{id}', [ProjectController::class, 'destroy']);


Route::get('/appointments', [AppointmentController::class, 'index']);    // opsional, biasanya untuk admin app
Route::post('/appointments', [AppointmentController::class, 'store']);   // ini buat form dari frontend!


