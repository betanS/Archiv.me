<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/dashboard', function () {
    //simulamos un usuario logueado temporalmente
    return view('dashboard');
});

Route::post('/profile', function (Illuminate\Http\Request $request) {
    session(['skills' => $request->input('skills')]); // save de session de las skills como medida temporal previa a configurar la db
    return view('profile');
});

