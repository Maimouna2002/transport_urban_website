<?php
namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterBasic extends Controller
{
    public function register()
    {
        return view('content.authentications.auth-register-basic');
    }

    public function processRegistration(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Création de l'utilisateur
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        // Connectez l'utilisateur après l'enregistrement si nécessaire
        // Auth::login($user);

        // Redirigez l'utilisateur vers une page de confirmation ou le tableau de bord
        return redirect()->route('dashboard-analytics')->with('success', 'Inscription réussie !');
    }
}
