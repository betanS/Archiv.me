<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Mostrar login
    public function showLogin()
    {
        return view('login');
    }

    // Procesar login
    public function login(Request $request)
{
    $request->validate([
    'email'    => 'required|email',
    'password' => 'required|string',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return back()->withErrors([
            'username' => 'Credenciales incorrectas',
        ]);
    }

    Auth::login($user); // inicia sesión
    $request->session()->regenerate();

    return redirect('/dashboard');
}


    // Mostrar register
    public function showRegister()
    {
        return view('register');
    }

    // Procesar register
    public function register(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required|string|min:4',
        ]);

        User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect('/login')->with('success', 'Account created successfully!');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
