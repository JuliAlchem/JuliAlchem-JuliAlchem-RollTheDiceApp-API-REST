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


Route::get('/users', [UserController::class, 'index']); // Done! 
Route::get('/users/{id}', [UserController::class, 'show']); // Done! 
Route::post('/users/{id}', [UserController::class, 'update']); // Done! : modifica el nom del jugador

Route::get('/games', [GameController::class, 'index']); // Done!
Route::get('/users/{id}/games', [GameController::class, 'show']); // Done!



Route::post('/users/{id}/games', [GameController::class, 'store']); // 
Route::delete('/users/{id}/games/', [GameController::class, 'destroy']); // Delete just 1 game





 
/*
// Cheking all Game Routes
Route::resource('players', PlayerController::class);
// Cheking all Game Routes
Route::resource('games', GameController::class); 
*/



// Testing
 

Route::get('/players/{user_id}/games', [GameController::class, 'show']); 


    



// Protected routes
Route::middleware('auth:sanctum')->group(function (){

    Route::post('/logout', [AuthController::class, 'logout']);

});

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/