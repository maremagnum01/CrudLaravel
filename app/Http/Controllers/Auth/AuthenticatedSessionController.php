<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\RedirectResponse;

class AuthenticatedSessionController extends Controller
{
    public function store(Request $request) :RedirectResponse
    {  
        $credentials = $request->validate([
            'email'=> ['required', 'email', 'string'],
            'password'=> ['required', 'string']
        ]);
        if (Auth::attempt($credentials,$request->boolean('remember'))){
            $request->session()->regenerate();
            return to_route('tasks.index')->with('status', 'Bienvenido');
        }
        throw ValidationException::withMessages([
            'email' => 'Error de indentificacion'
        ]);
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('tasks.index')->with('status', 'Usuario desconectado');
    }
}
