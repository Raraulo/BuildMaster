<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => fake()->sentence(),
            'descripcion' => fake()->paragraph(),
            'estado' => fake()->randomElement(['pendiente', 'en_progreso', 'completado']),
            'prioridad' => fake()->randomElement(['baja', 'media', 'alta']),
            'fecha_vencimiento' => fake()->optional()->date(),
            'project_id' => \App\Models\Project::factory(),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
