<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->delete();

        User::create([
            'name' => 'Aitana Creator',
            'email' => 'creator@bookhaven.test',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'Maria User',
            'email' => 'maria@bookhaven.test',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'Carla User',
            'email' => 'carla@bookhaven.test',
            'password' => Hash::make('password123'),
        ]);
    }
}
