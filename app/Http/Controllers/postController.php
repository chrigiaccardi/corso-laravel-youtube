<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;

class postController extends Controller
{
    public function recuperoPost(): View
    {
        // Recupera tutti i post
        $posts = Post::all();

        //Mostra tutti i post
        return view('posts.index', ['posts' => $posts]);
    }

    public function creazionePost(): View
    {
        // Creare un nuovo post con dati fittizzi
        $post = Post::factory()->create();
        // Mostra un messaggio di conferma con l'ID del post creato
        return view('posts.create', ['post' => $post]);
    }

    public function cancellazionePost(int $id): View
    {
        // Recupera ed elimina con l'id specificato
        $post = Post::find($id);

        if ($post) {
            $post->delete();
            $message = "Il post con ID $id è stato cancellato";
        } else {
            $message = "Il post con ID $id non è stato trovato";
        }

        // Mostra un messaggio di conferma dell'eliminazione
        return view('posts.delete', ['message' => $message]);
    }

    public function postGetById(int $id):View {
        // Ricerca il post con l'id indicato in ingresso
        $post = Post::findorfail($id);
        // Ritorna la view con i dettagli del post indicato
        return view('posts.show', ['post' => $post]);
    }
}
