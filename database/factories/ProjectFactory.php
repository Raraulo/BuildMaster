<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->company() . ' Project',
            'descripcion' => fake()->paragraph(),
            'estado' => fake()->randomElement(['pendiente', 'en_progreso', 'completado']),
            'fecha_inicio' => fake()->date(),
            'fecha_fin' => fake()->optional()->date(),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
