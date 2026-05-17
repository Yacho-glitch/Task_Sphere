<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/tasks/create', [DashboardController::class, 'create'])->name('create');

Route::post('/tasks', [DashboardController::class, 'store']);

Route::get('/tasks/{task}/edit', [DashboardController::class, 'edit'])->name('tasks.edit');

Route::put('/tasks/{task}', [DashboardController::class, 'DashboardController@update'])->name('tasks.update');

Route::delete('/tasks/{task}', [DashboardController::class, 'destroy'])->name('tasks.destroy');