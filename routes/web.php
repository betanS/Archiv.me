<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

// --------------------
// Home / Index
// --------------------
Route::get('/', function () {
    return view('index');
});

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');


// Register
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

// --------------------
// Dashboard
// --------------------
// Antes: Route::get('/dashboard', function() { return view('dashboard'); });
// Ahora:

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/dashboard/save-skills', [DashboardController::class, 'saveSkills'])->name('dashboard.saveSkills');
});

// --------------------
// Profile (solo lectura por ahora)
// --------------------
Route::get('/profile', [DashboardController::class, 'profile']); // más adelante para multi-perfil
