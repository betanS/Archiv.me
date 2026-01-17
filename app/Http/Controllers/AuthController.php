<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
{
    $request->validate([
        'username' => 'required|unique:users,name',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:4',
    ]);

    $user = User::create([
        'name' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    session(['username' => $user->name]);

    return redirect('/dashboard');
}


    public function login(Request $request)
    {
        $user = User::where('name', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['Invalid credentials']);
        }

        session(['username' => $user->name]);

        return redirect('/dashboard');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/');
    }
}
