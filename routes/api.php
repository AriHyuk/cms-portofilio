<?php

use App\Http\Controllers\OrderUmrohController;
use Illuminate\Support\Facades\Route;

Route::apiResource('order-umroh', OrderUmrohController::class);