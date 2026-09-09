<?php

use App\Http\Controllers\provaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/prova', [provaController::class, 'provaFunction']);
Route::post('/prova', [provaController::class, 'provaData']);
