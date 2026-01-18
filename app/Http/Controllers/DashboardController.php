<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Mostrar dashboard
    public function index()
    {
        return view('dashboard');
    }

    // Guardar skills
    public function saveSkills(Request $request)
    {
        $user = Auth::user();
        $user->skills = $request->input('skills', []); // array de skills
        $user->save();

        return redirect()->back()->with('success', 'Skills updated!');
    }

    // -------------------------
    // Mostrar profile
    // -------------------------
    public function profile($name)
{
    $user = User::where('name', $name)->first();

    if (!$user) abort(404);

    $skills = $user->skills ?? [];

    return view('profile', compact('user', 'skills'));
}

}
