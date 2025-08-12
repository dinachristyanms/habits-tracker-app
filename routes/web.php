<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HabitController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CalenderController;


Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('habits', HabitController::class);


Route::get('/kalender', [CalenderController::class, 'index'])->name('kalender.index');
