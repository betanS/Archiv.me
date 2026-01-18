<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Mostrar perfil público de un usuario por su nombre (username).
     */
    public function show($name)
    {
        // Buscar usuario por nombre (username)
        $user = User::where('name', $name)->first();

        if (!$user) {
            // Redirigir al home si no existe
            return redirect('/')->with('error', 'Usuario no encontrado.');
        }

        // Retornar la vista profile pasando $user
        return view('profile', compact('user'));
    }
}
