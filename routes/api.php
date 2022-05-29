<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\PlayerController;



// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Testing
    Route::post('/players', [PlayerController::class, 'store']); // done! check id!
    Route::put('/players/{id}', [PlayerController::class, 'update']);
    Route::get('/players', [PlayerController::class, 'index']); // done! 

// Protected routes
Route::middleware('auth:sanctum')->group(function (){

    Route::post('/logout', [AuthController::class, 'logout']);

});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
