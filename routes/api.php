<?php

use App\Http\Controllers\Api\AppointmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\CertificateController;
use App\Http\Controllers\Api\HeroSectionController;
use App\Http\Controllers\Api\AboutProfileController;
use App\Http\Controllers\Api\AboutSectionController;
use App\Http\Controllers\Api\SkillController;
use App\Http\Controllers\Api\ExperienceController;
use App\Http\Controllers\Api\ServiceController;

Route::get('/skills', [SkillController::class, 'index']);
Route::get('/experiences', [ExperienceController::class, 'index']);
Route::get('/services', [ServiceController::class, 'index']);

Route::get('/about-section', [AboutSectionController::class, 'index']);

Route::get('/about-profile', [AboutProfileController::class, 'index']);

Route::get('/hero', [HeroSectionController::class, 'index']);
Route::get('/hero/{id}', [HeroSectionController::class, 'show']);
Route::put('/hero/{id}', [HeroSectionController::class, 'update']);
Route::patch('/hero/{id}', [HeroSectionController::class, 'update']);

Route::get('/certificates', [CertificateController::class, 'index']);
Route::get('/certificates/{id}', [CertificateController::class, 'show']);
Route::post('/certificates', [CertificateController::class, 'store']);
Route::put('/certificates/{id}', [CertificateController::class, 'update']);
Route::patch('/certificates/{id}', [CertificateController::class, 'update']);
Route::delete('/certificates/{id}', [CertificateController::class, 'destroy']);


Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{id}', [ProjectController::class, 'show']);
Route::post('/projects', [ProjectController::class, 'store']);
Route::put('/projects/{id}', [ProjectController::class, 'update']);
Route::patch('/projects/{id}', [ProjectController::class, 'update']);
Route::delete('/projects/{id}', [ProjectController::class, 'destroy']);


Route::get('/appointments', [AppointmentController::class, 'index']);    // opsional, biasanya untuk admin app
Route::post('/appointments', [AppointmentController::class, 'store']);   // ini buat form dari frontend!


