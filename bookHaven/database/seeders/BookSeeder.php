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
        Book::query()->delete();

        $creator = User::where('email', 'creator@bookhaven.test')->first();
        $maria = User::where('email', 'maria@bookhaven.test')->first();
        $carla = User::where('email', 'carla@bookhaven.test')->first();

        // Libro en estado editable (reading).
        Book::create([
            'title' => 'The Great Gatsby',
            'author' => 'F. Scott Fitzgerald',
            'genre' => 'Classic Fiction',
            'total_pages' => 180,
            'status' => 'reading',
            'summary' => 'Jay Gatsbys tragic obsession with Daisy Buchanan unfolds in this 1920s.',
            'add_by_user_id' => $carla?->id,
            'currently_reading_user_id' => $carla?->id,
        ]);

        // Libro en estado no editable (finished).
        Book::create([
            'title' => 'Project Hail Mary',
            'author' => 'Andy Weir',
            'genre' => 'Science Fiction',
            'total_pages' => 473,
            'status' => 'finished',
            'summary' => 'An amnesiac astronaut uses science and an alien ally to save Earth.',
            'add_by_user_id' => $maria?->id,
            'currently_reading_user_id' => null,
        ]);

        // Libros creados por distintos usuarios.
        Book::create([
            'title' => 'Educated',
            'author' => 'Tara Westover',
            'genre' => 'Memoir',
            'total_pages' => 334,
            'status' => 'available',
            'summary' => 'A woman escapes a violent, isolated survivalist upbringing in Idaho.',
            'add_by_user_id' => $creator?->id,
            'currently_reading_user_id' => null,
        ]);
    }
}
