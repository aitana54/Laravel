<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
    public function store(Request $request)
    {
        // Campos permitidos según el modelo Book
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

        $book = Book::create($data);

        return response()->json($book, 201);
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
