<?php

namespace App\Http\Controllers;

use App\Models\User;

class profileController extends Controller
{
    public function creaUtente(){
        // creare un utente
        // $user = User::factory()->create();
        // Creare + utenti con count()
        // $user = User::factory()->count(5)->create();
        // Se voglio un utente con qualcosa di particolare
        $user = User::factory()->create();
        
        return $user;
    }

    public function creaUtenteNonVerificato(){
        $user = User::factory()->unverified()->create();
        return $user;
    }
}
