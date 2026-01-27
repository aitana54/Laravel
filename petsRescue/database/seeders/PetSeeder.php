<?php

namespace Database\Seeders;

use App\Models\Pet;
use App\Models\User;
use Illuminate\Database\Seeder;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pet::query()->delete();

        $admin = User::where('email', 'admin@petrescue.test')->first();
        $ana = User::where('email', 'ana@petrescue.test')->first();
        $pau = User::where('email', 'pau@petrescue.test')->first();

        // Mascota NO adoptada creada por Ana (editable por Ana si policy = creador)
        Pet::create([
            'name' => 'Luna',
            'species' => 'dog',
            'age' => 3,
            'status' => 'available',
            'description' => 'Cariñosa y activa.',
            'created_by' => $ana?->id,
            'adopted_by' => null,
        ]);

        // Mascota adoptada creada por Ana (bloqueada por FormRequest authorize si status=adopted)
        Pet::create([
            'name' => 'Milo',
            'species' => 'cat',
            'age' => 2,
            'status' => 'adopted',
            'description' => 'Tranquilo, le gusta dormir.',
            'created_by' => $ana?->id,
            'adopted_by' => $pau?->id,
        ]);

        // Mascota en pending creada por Pau
        Pet::create([
            'name' => 'Nala',
            'species' => 'dog',
            'age' => 1,
            'status' => 'pending',
            'description' => 'En proceso de adopción.',
            'created_by' => $pau?->id,
            'adopted_by' => null,
        ]);

        // Mascota creada por Admin (para probar “otro creador”)
        Pet::create([
            'name' => 'Rocky',
            'species' => 'dog',
            'age' => 6,
            'status' => 'available',
            'description' => 'Muy obediente.',
            'created_by' => $admin?->id,
            'adopted_by' => null,
        ]);
    }
}
