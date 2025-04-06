<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\DashboardController;

Route::get('/', HomeController::class);

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('users', UserController::class);
    Route::resource('class', ClassroomController::class);
    Route::resource('students', StudentController::class);
    Route::resource('attendances', AttendanceController::class);
});
