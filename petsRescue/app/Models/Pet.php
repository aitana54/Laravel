<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    /**
     * Campos que se pueden asignar de forma masiva.
     */
    protected $fillable = [
        'name',
        'species',
        'age',
        'status',
        'description',
        'created_by',
        'adopted_by',
    ];

    /**
     * Usuario que ha registrado la mascota.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
