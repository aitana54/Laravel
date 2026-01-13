<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;

Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/me', [AuthController::class, 'me']);
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});

// Pets: lectura pública
Route::apiResource('pets', PetController::class)->only(['index', 'show']);

// Pets: escritura protegida
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('pets', PetController::class)->only(['store', 'update', 'destroy']);
});
/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// CRUD routes for pets
Route::apiResource('pets', PetController::class);
*/
