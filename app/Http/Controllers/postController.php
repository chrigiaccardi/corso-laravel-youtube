<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
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

    // Rest API: Funzione Index per ritornare in formato json la risposta di tutti i post con 200 come status OK
    public function index(){
        return response()->json(Post::all(), 200);
    }
    // Rest API: Funzione Show per ritornare in formato json solo 1 post tramite id
    public function show($id){
        // Troviamo il post tramite ID
        $post = Post::find($id);
        // SE lo trova lo ritorna in json, altrimenti ritorna il messaggio di non trovato con errore 404
        if ($post) {
            return response()->json($post, 200);
        } else {
            return response()->json(['message' => 'Post Non Trovato', 404]);
        }
        
    }
    // Rest API: Funzione Store per inserire un elemento
    public function store(Request $request){
        // Validiamo la richiesta
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'user_id' => 'required|exists:users,id'
        ]);
        // Creiamo il post con i dati arrivati dalla richiesta
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->user_id,
        ]);
        // Ritorniamo la risposta con l'inserimento del post e 201 di conferma
        return response()->json($post, 201);
    }
    // Rest API: Funzione Update per aggiornare e modificare un post già esistente
    public function update(Request $request, $id){
        // Ricerchiamo il post
        $post = Post::find($id);
        // Se il post esiste lo validiamo e andiamo ad aggiornarlo
        if ($post) {
            // Validazione
            $request->validate([
                'title' => 'sometimes|required|string|max:255',
                'content' => 'sometimes|required|string',
            ]);
            // Aggiornamento
            $post->update($request->only(['title', 'content']));
            // Ritorniamo il post json con 200 OK
            return response()->json($post, 200);
        } else {
            // Se non trovato ritorniamo il messaggio
            return response()->json(['message' => 'Post non Trovato', 404]);
        }
    }
    // Rest API: Funzione Destroy per cancellare un post specifico
    public function destroy ($id){
        // Troviamo il post
        $post = Post::find($id);
        // Se il post elimino e ritorno il messaggio di conferma 200;
        if ($post) {
            $post->delete();
            return response()->json(['message' => 'Post Cancellato'], 200);
        } else {
            return response()->json(['message' => 'Post non trovato'], 404);
        }
        
    } 
}
