<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Lista todas los libros.
     */
    public function index()
    {
        // Más adelante se puede añadir paginación
        $books = Book::ordeBy('id', 'desc')->get();

        return response()->json($books);
    }

    /**
     * Crea un nuevo libro.
     */
    public function store(StoreBookRequest $request)
    {

        $book = Book::create($request->validated());

        return response()->json($book, 201);
    }

    /**
     * Muestra un libro concreto.
     */
    public function show(Book $book)
    {
        // Gracias al Route Model Binding, $book llega cargada
        return response()->json($book);
    }

    /**
     * Actualiza un libro existente.
     */
    public function update(Request $request, Book $book)
    {
        $data = $request->only([
            'title',
            'author',
            'genre',
            'total_pages',
            'status',
            'summary',
            'add_by_user_id',
            'currently_reading_user_id',
        ]);

        $book->update($data);

        return response()->json($book);
    }

    /**
     * Elimina un libro.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return response()->json(null, 204);
    }
}
