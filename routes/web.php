<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'showRegister'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'authentication'])->name('login.authentication');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/tasks/create', [DashboardController::class, 'create'])->name('create');
    Route::post('/tasks', [DashboardController::class, 'store']);
    Route::get('/tasks/{task}/edit', [DashboardController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{task}', [DashboardController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{task}', [DashboardController::class, 'destroy'])->name('tasks.destroy');
    
});










Route::post('/logout', [LoginController::class, 'logout'])->name('logout');