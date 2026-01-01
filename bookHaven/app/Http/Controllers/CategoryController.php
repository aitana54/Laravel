<?php

namespace App\Http\Controllers;

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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
