<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'content','user_id'])]
class Post extends Model {
    use HasFactory;

    // Colleghiamo il post al suo utente che l'ha creato, crea una relazione tra l'user_id e l'ID dell'utente nella sua Tabella
    public function user(){
        return $this->belongsTo(User::class);
    }
}
