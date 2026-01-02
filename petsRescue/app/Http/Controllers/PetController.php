<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePetRequest;
use App\Http\Requests\UpdatePetRequest;
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
    public function store(StorePetRequest $request)
    {
        $pet = Pet::create($request->validate());

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
     * Actualiza una mascota existente.
     */
    public function update(UpdatePetRequest $request, Pet $pet)
    {

        $pet->update($request->validated());

        return response()->json($pet);
    }

    /**
     * Elimina una mascota.
     */
    public function destroy(Pet $pet)
    {
        $pet->delete();

        return response()->json(null, 204);
    }
}
