<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Crear una reseña para un libro específico.
     * La reseña está asociada tanto al libro como al usuario.
     */
    public function store(Request $request, Book $book)
    {
        // Validación de los campos necesarios para la reseña

        $request->validate([
            'content' => 'required|string|max:500',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Crear la reseña y asociarla al libro y al usuario autenticado
        $review = $book->reviews()->create([
            'user_id' => auth()->id(), // Asocia la reseña al usuario autenticado
            'content' => $request->content,
            'rating' => $request->rating,
            'book_id' => $book->id, // Aquí asociamos explícitamente el libro a la reseña
        ]);

         return response()->json($review, 201); // Código 201 para indicar que se creó el recurso
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
