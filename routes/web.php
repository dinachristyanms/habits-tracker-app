<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HabitController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\AuthController;


// AUTHCONTROLLER
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);



Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');
    
Route::resource('habits', HabitController::class);


Route::get('/kalender', [CalenderController::class, 'index'])->name('kalender.index');
