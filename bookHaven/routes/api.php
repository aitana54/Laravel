<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
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


// Rutas para categorias
Route::get('categories', [CategoryController::class, 'index']); // Listar categorías
Route::post('categories', [CategoryController::class, 'store']); // Crear categoría
Route::delete('categories/{category}', [CategoryController::class, 'destroy']); // Eliminar categoría

// Asignar una categoría a un libro
Route::post('books/{book}/categories', [CategoryController::class, 'assignCategoryToBook']);

// Listar libros de una categoría específica
Route::get('categories/{category}/books', [CategoryController::class, 'booksInCategory']);
