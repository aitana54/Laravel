<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Lista todas las mascotas.
     */
    public function index()
    {
        // Mas adelante se puede añadir paginación
        $pets = Pet::orderBy('id', 'desc')->get();

        return response()->json($pets);
    }

    /**
     * Crea una nueva mascota.
     *
     * En esta demo se hace una validación "seria";
     * se mejorará en la demo siguiente usando FormRequests.
     */
    public function store(Request $request)
    {
        // Campos permitidos según el modelo Pet
        $data = $request->only([
            'name',
            'species',
            'age',
            'status',
            'description',
            'created_by',
            'adopted_by',
        ]);

        $pet = Pet::create($data);

        return response()->json($pet, 201);
    }

    /**
     * Muestra una mascota concreta.
     */
    public function show(Pet $pet)
    {
        // Gracias al Route Model Binding, $pet llega cargada
        return response()->json($pet);
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
