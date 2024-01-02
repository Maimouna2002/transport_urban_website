<?php

namespace App\Http\Controllers\authentications;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;

class LoginBasic extends Controller
{
    public function index()
    {
        return view('content.authentications.auth-login-basic');
    }

    public function login(AuthRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentification réussie, connectez l'utilisateur et redirigez-le vers le tableau de bord
            return redirect()->route('dashboard-analytics');
        } else {
            // Authentification échouée, redirigez vers la page de connexion avec un message d'erreur
            return redirect()->back()->withErrors(['error' => 'Identifiants invalides']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function getUsername()
    {
        $user = Auth::user();
        $username = $user ? $user->name : null;
        return $username;
    }
}
