<?php

use App\Http\Controllers\provaController;
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
