<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->delete();

        $creator = User::where('email', 'creator@bookhaven.test')->first();
        $maria = User::where('email', 'maria@bookhaven.test')->first();
        $carla = User::where('email', 'carla@bookhaven.test')->first();
    }
}
