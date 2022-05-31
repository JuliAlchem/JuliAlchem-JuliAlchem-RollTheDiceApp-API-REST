<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;


use App\Http\Controllers\UserController;

use App\Http\Controllers\PlayerController;
use App\Http\Controllers\GameController;


// Public routes
Route::post('/register', [AuthController::class, 'register']); // Done!: crea un jugador
Route::post('/login', [AuthController::class, 'login']); //Done!

Route::post('/users/{id}', [UserController::class, 'update']); // Done! : modifica el nom del jugador
Route::post('users/{id}/games', [GameController::class, 'store']); // Done! : un jugador específic realitza una tirada dels daus.
Route::delete('/users/{id}/games/', [GameController::class, 'destroy']); // Done! : elimina les tirades del jugador

Route::get('/users', [UserController::class, 'index']); 

Route::get('/users/{id}/games', [GameController::class, 'show']); // Done! : retorna el llistat de jugades per un jugador.

Route::get('/users/ranking', [UserController::class, 'ranking']); // Done! : el percentatge mig d’èxits.
Route::get('/users/ranking/winner', [UserController::class, 'winner']);
Route::get('/users/ranking/loser', [UserController::class, 'loser']);




Route::get('/users/{id}', [UserController::class, 'show']); // Done! 
Route::get('/games', [GameController::class, 'index']); 






 // Delete just 1 game





 
/*
// Cheking all Game Routes
Route::resource('players', PlayerController::class);
// Cheking all Game Routes
Route::resource('games', GameController::class); 
*/



// Testing
 


// Protected routes
Route::middleware('auth:sanctum')->group(function (){

    Route::post('/logout', [AuthController::class, 'logout']);

});

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/