<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Ruta de verificación de estado. Retorna el estado de la app y la conexión a la BD.
Route::get('/health', function () {
    $dbStatus = 'ok';
    try {
        \Illuminate\Support\Facades\DB::connection()->getPdo();
    } catch (\Exception $e) {
        $dbStatus = 'error: ' . $e->getMessage();
    }

    return response()->json([
        'status' => 'ok',
        'app' => config('app.name'),
        'time' => now()->toIso8601String(),
        'database' => $dbStatus,
    ]);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Rutas CRUD para libros
Route::apiResource('books', BookController::class);

// Rutas para reseñas
Route::post('books/{book}/reviews', [ReviewController::class, 'store']); //Crear reseña
Route::delete('books/{book}/reviews/{review}', [ReviewController::class, 'destroy']); // Eliminar reseña
