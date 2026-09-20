<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class profileController extends Controller
{
    public function creaUtente()
    {
        // creare un utente
        // $user = User::factory()->create();
        // Creare + utenti con count()
        // $user = User::factory()->count(5)->create();
        // Se voglio un utente con qualcosa di particolare
        $user = User::factory()->create();

        return $user;
    }

    public function creaUtenteNonVerificato()
    {
        $user = User::factory()->unverified()->create();
        return $user;
    }

    public function uploadImage(Request $request)
    {
        // Validiamo l'immagine in entrata
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // Prendiamo l'user corrente autenticato
        $user = Auth::user();

        // Se ha già la foto profilo la cancelliamo dallo storage
        if ($user->profile_image) {
            Storage::delete('public/' . $user->profile_image);
        }

        // Ora prendiamo il percorso della foto profilo in entrata e lo indirizziamo verso
        // La cartella profile_images dentro public
        $path = $request->file('profile_image')->store('profile_images', 'public');

        // Ora modifichiamo l'img del profilo dell'utente e salviamo
        $user->profile_image = $path;
        $user->save();

        // REindirizziamo alla home con il messaggio di successo
        return redirect()->route('home')->with('success', 'Immagine caricata con successo!');
    }
}
