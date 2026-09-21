<?php

use App\Http\Controllers\postController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Andiamo a creare le Route CRUD per i posts (come esempio) - Nomenclatura differente che JS
// Index: Ricevere tutti i post
Route::get('/posts', [postController::class, 'index']);
// Show: Ricevere solo un post
Route::get('/posts/{id}', [postController::class, 'show']);
// Store: Inserire un nuovo post
Route::post('/posts', [postController::class, 'store']);
// Update: Modifica del singolo post
Route::put('/posts/{id}', [postController::class, 'update']);
// Destroy: Eliminazione di un singolo post
Route::delete('/posts/{id}', [postController::class, 'destroy']);
