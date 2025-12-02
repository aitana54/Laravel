<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;


// Ruta /api/health
Route::get('/health');

// Ruta /api/info
Route::get('/info', function () {
    return response()->json([
        'store_name' => 'BookHaven',
        'books_in_stock' => 125,
        'genres' => ['ficción', 'ensayo', 'infantil', 'misterio'],
    ]);
});
