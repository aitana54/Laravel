<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
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
    public function store(StoreReviewRequest $request, Book $book)
    {
        // Se valida el request automáticamente a través de StoreReviewRequest
        // Usamos $request->validated() para obtener solo los datos validados
        $review = $book->reviews()->create($request->validated() + ['user_id' => auth()->id()]);

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
     * Eliminar una reseña de un libro específico.
     * Solo el usuario que creó la reseña o el administrador pueden eliminarla.
     */
    public function destroy(Review $review)
    {
        // Verifica si el usuario autenticado es el autor de la reseña
        if ($review->user_id !== auth()->id()) {
            return response()->json(['error' => 'No autorizado'], 403); // Error 403 si no es el autor
        }

        $review->delete();

        return response()->json(null, 204); // Respuesta sin contenido (status 204)
    }
}
