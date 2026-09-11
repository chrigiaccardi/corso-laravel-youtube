<?php

use App\Http\Controllers\postController;
use App\Http\Controllers\provaController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', function () {
    return view('home', [
        'pageTitle' => 'home',
        'metaTitle' => 'home metadati dinamici'
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
Route::get('/profile', [provaController::class, 'show'])->name('profile');

// Recupero e Visualizzazione Post
Route::get('/posts', [postController::class, 'recuperoPost'])->name('posts.index');
// Creazione Post
Route::get('/posts/create', [postController::class, 'creazionePost'])->name('posts.create');
// Cancellazione Post
Route::get('/posts/delete/{id}', [postController::class, 'cancellazionePost'])->name('posts.delete');
