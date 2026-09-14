<?php

use App\Http\Controllers\postController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\provaController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', function () {
    return view('home', [
        'pageTitle' => 'home',
        'metaTitle' => 'home metadati dinamici',
    ]);
});
Route::get('/about', function () {
    return view('about', [
        'pageTitle' => 'About',
        'metaTitle' => 'About metadati dinamici'
    ]);
});
Route::get('/prova', [provaController::class, 'provaFunction']);
Route::post('/prova', [provaController::class, 'provaData']);
Route::get('/profile', [profileController::class, 'creaUtente'])->name('newProfile');
Route::get('/profile/unverified', [profileController::class, 'creaUtenteNonVerificato'])->name('utenteNonVerificato');

// Recupero e Visualizzazione Post
Route::get('/posts', [postController::class, 'recuperoPost'])->name('posts.index');
// Creazione Post
Route::get('/posts/create', [postController::class, 'creazionePost'])->name('posts.create');
// Cancellazione Post
Route::delete('/posts/{post}', [postController::class, 'cancellazionePost'])->where('id', '[0-9]+')->name('posts.delete');
// Recupero di un post dedicato
Route::get('/posts/{post}', [postController::class, 'postGetById'])->where('id', '[0-9]+')->name('postGetById');
// Modifica Post By Id
Route::put('/post/{post}', [postController::class, 'modificaPostById'])->where('id', '[0-9]+')->name('modificaPostById');