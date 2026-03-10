<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->firstName(),
            'species' => fake()->randomElement(['dog', 'cat']),
            'age' => fake()->numberBetween(0, 15),
            'status' => fake()->randomElement(['available', 'pending']),
            'description' => fake()->sentence(),

            // Por defecto: crea también un usuario creador si no se lo pasas
            'created_by' => User::factory(),
            'adopted_by' => null,
        ];
    }

    public function available(): self
    {
        return $this->state(function () {
            return [
                'status' => 'available',
                'adopted_by' => null,
            ];
        });
    }

    public function pending(): self
    {
        return $this->state(function () {
            return [
                'status' => 'pending',
                'adopted_by' => null,
            ];
        });
    }

    public function adopted(): self
    {
        return $this->state(function () {
            return [
                'status' => 'adopted',
                'adopted_by' => User::factory(),
            ];
        });
    }
}
