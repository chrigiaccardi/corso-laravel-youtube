<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
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

    public function cancellazionePost(Post $post)
    {
        // Recupera il post con l'id specificato / Oppure passiamo direttamente il post come modello post
        // $post = Post::find($id);
        
        // Elimina il post specificato
        $post->delete();

        // Mostra un messaggio di conferma dell'eliminazione
        return redirect()->route('posts.index')->with('success', 'Post eliminato con successo');
    }

    public function postGetById(Post $post):View {
        // Ricerca il post con l'id indicato in ingresso / Oppure passiamo direttamente il post come modello post
        // $post = Post::findOrFail($id);

        // Ritorna la view con i dettagli del post indicato
        return view('posts.show', ['post' => $post]);
    }

    public function modificaPostById(Request $request, Post $post){
        // Ricerchiamo il Post giusto con l'ID / Oppure passiamo direttamente il post come modello post
        // $post = Post::findOrFail($id);

        // Prendiamo le modifiche e le salviamo
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        // Ritorniamo il post dedicato con il successo
        return redirect()->route('posts.show', ['id' => $post->id])->with('success', 'Post aggiornato con successo');
    }
}
