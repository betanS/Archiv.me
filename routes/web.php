<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    if (!session()->has('username')) {
        return redirect('/login');
    }
    return view('dashboard');
});


Route::post('/profile', function (Illuminate\Http\Request $request) {
    session(['skills' => $request->input('skills')]); // save de session de las skills como medida temporal previa a configurar la db
    return view('profile');
});

 use App\Http\Controllers\AuthController;

Route::get('/login', fn() => view('login'));
Route::get('/register', fn() => view('register'));

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout']);
