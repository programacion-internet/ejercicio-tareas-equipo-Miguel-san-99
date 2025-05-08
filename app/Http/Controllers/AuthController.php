<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showRegistrar(){
        return view('auth.registrar');
    }

    public function showLogin(){
        return view('auth.login');
    }
    public function registrar(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);
        $user = User::create($validated);
        Auth::login($user);
        return redirect()->route('home');
    }

    public function login(Request $request){
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            return redirect()->route('home');
        }
        throw ValidationException::withMessages([
            'credentials' => 'Lo siento, contraseña incorrecta'
        ]);
    }
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
