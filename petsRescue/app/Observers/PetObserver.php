<?php

namespace App\Observers;

use App\Models\Pet;

class PetObserver
{
    // Se ejecuta cuando se recupera una mascota desde la base de datos.
    public function retrieved(Pet $pet)
    {
    }

    // Se ejecuta justo antes de crear una nueva mascota.
    public function creating(Pet $pet)
    {
    }

    // Se ejecuta justo después de crear una nueva mascota.
    public function created(Pet $pet)
    {
    }

    // Se ejecuta justo antes de actualizar una mascota existente.
    public function updating(Pet $pet)
    {
    }

    // Se ejecuta justo después de actualizar una mascota existente.
    public function updated(Pet $pet)
    {
    }

    // Se ejecuta justo antes de guardar una mascota (crear o actualizar).
    public function saving(Pet $pet)
    {
        if ($pet->adopted_by !== null) {
            $pet->status = 'adopted';
        }
    }

    // Se ejecuta justo después de guardar una mascota (crear o actualizar).
    public function saved(Pet $pet)
    {
    }

    // Se ejecuta justo antes de eliminar una mascota.
    public function deleting(Pet $pet)
    {
    }

    // Se ejecuta justo después de eliminar una mascota.
    public function deleted(Pet $pet)
    {
    }

    // Se ejecuta justo antes de restaurar una mascota eliminada lógicamente.
    public function restoring(Pet $pet)
    {
    }

    // Se ejecuta justo después de restaurar una mascota eliminada lógicamente.
    public function restored(Pet $pet)
    {
    }

    // Se ejecuta justo antes de eliminar una mascota de forma permanente.
    public function forceDeleting(Pet $pet)
    {
    }

    // Se ejecuta justo después de eliminar una mascota de forma permanente.
    public function forceDeleted(Pet $pet)
    {
    }

    // Se ejecuta justo antes de clonar una mascota con replicate().
    public function replicating(Pet $pet)
    {
    }
}
