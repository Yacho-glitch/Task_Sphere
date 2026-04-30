<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::get('/tasks/create', [DashboardController::class, 'create']);

Route::post('/tasks', [DashboardController::class, 'store']);


