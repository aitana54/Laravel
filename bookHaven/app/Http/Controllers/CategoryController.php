<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Listar todas las categorías.
     */
    public function index()
    {
         $categories = Category::all(); // Obtener todas las categorías
        return response()->json($categories);
    }

    /**
     * Crear una nueva categoría.
     */
    public function store(Request $request)
    {
        // Validación de los datos de la nueva categoría
        $request->validate([
            'name' => 'required|string|max:255', // Nombre obligatorio, con un máximo de 255 caracteres
            'description' => 'nullable|string|max:500', // Descripción opcional, con un límite de 500 caracteres
        ]);

        // Crear la categoría
        $category = Category::create($request->only(['name', 'description']));

        return response()->json($category, 201); // Código 201 para indicar que se creó el recurso
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
     * Eliminar una categoría.
     * Solo puedes eliminar una categoría si no tiene libros asignados.
     */
    public function destroy(Category $category)
    {
        // Verificar si la categoría tiene libros asignados
        if ($category->books()->count() > 0) {
            return response()->json(['error' => 'No se puede eliminar la categoría, tiene libros asignados.'], 400);
        }

        $category->delete();

        return response()->json(null, 204);
    }

    /**
     * Asignar una categoría a un libro específico.
     */
    public function assignCategoryToBook(Request $request, Book $book)
    {
        // Validación de que se pase una categoría válida
        $request->validate([
            'category_id' => 'required|exists:categories,id', // Validar que la categoría exista en la base de datos
        ]);

        // Asignar la categoría al libro
        $book->categories()->attach($request->category_id);

        return response()->json($book);
    }

    /**
     * Listar todos los libros de una categoría específica.
     */
    public function booksInCategory(Category $category)
    {
        $books = $category->books; // Obtener todos los libros asociados a la categoría
        return response()->json($books);
    }
}
