<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\postController;
use App\Http\Controllers\provaController;
use App\Http\Controllers\ValidationController;
use App\Http\Middleware\AddCustomHeader;
use App\Jobs\SimpleJob;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('form', [
        'pageTitle' => 'Homepage',
        'metaTitle' => 'Homepage nel meta title'
    ]);
})->name('form');


Route::get('/home', function () {
    // La job viene eseguita subito
    // $job = new SimpleJob('Nuovo Log 2.0');
    // $job->handle();

    // La Job viene messa in coda nella Tab. Jobs
    // SimpleJob::dispatch('Messaggio dispatch');
    // La Job viene messa in coda ma con un delay, disponibilità ritardata
    SimpleJob::dispatch('Messaggio 1 minuto')->delay(now()->addMinutes(1));

    return view('home', [
        'pageTitle' => 'Homepage',
        'metaTitle' => 'home metadati dinamici'
    ]);
})->name('home');

Route::get('/about', function () {
    return view('about', [
        'pageTitle' => 'About',
        'metaTitle' => 'About metadati dinamici'
    ]);
})->middleware('auth');
Route::get('/prova', [provaController::class, 'provaFunction']);
Route::post('/prova', [provaController::class, 'provaData']);
Route::get('/profile', [provaController::class, 'show'])->name('profile');

// Recupero e Visualizzazione Post
Route::get('/posts', [postController::class, 'recuperoPost'])->name('posts.index');
// Creazione Post
Route::get('/posts/create', [postController::class, 'creazionePost'])->name('posts.create');
// Cancellazione Post
Route::get('/posts/delete/{id}', [postController::class, 'cancellazionePost'])->name('posts.delete');
// Validazione del Form
Route::post('/form', [ValidationController::class, 'validateForm'])->name('validateForm');

// Route di registrazione
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('showRegistrationForm');
Route::post('/register', [AuthController::class, 'registerUser'])->name('registerUser');

// Route per il login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'loginUser'])->name('loginUser');
// Route per il Logout
Route::post('/logout', [AuthController::class, 'logoutUser'])->name('logoutUser');
