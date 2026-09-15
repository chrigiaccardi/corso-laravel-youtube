<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Funzione per andare al form di registrazione
    public function showRegistrationForm()
    {
        return view('register');
    }

    // Funzione per effettuare la registrazione (Validazione dati e inserimento nel DB)
    public function registerUser(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Autenticazione automatica della sessione con l'user appena creato
        Auth::login($user);

        return redirect()->route('showRegistrationForm')->with('success', 'Registrazione avvenuta con successo! Sei stato loggato automaticamente.');
    }

    // Funzione per effettuare il login (Validazione e autenticazione con confronto DB)
    public function loginUser(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/home')->with('success', 'Login effettuato con Successo!');
        }

        return back()->withErrors([
            'email' => 'Le credenziali fornite non sono corrette.'
        ])->onlyInput('email');
    }

    // Funzione per il logout
    public function logoutUser(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Logout effettuato con successo!');
    }

    // Funzione per visualizzare il form di login
    public function showLoginForm()
    {
        return view('login');
    }
}
