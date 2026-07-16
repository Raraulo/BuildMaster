<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\Project;
use Carbon\Carbon;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $states = ['pendiente', 'en_progreso', 'completado']; $priorities = ['baja', 'media', 'alta'];
        $projects = Project::all();
        foreach (range(1, 10) as $i) {
            Task::create([
                'titulo' => "Tarea $i",
                'descripcion' => "Descripción de la tarea $i",
                'estado' => $states[array_rand($states)],
                'prioridad' => $priorities[array_rand($priorities)],
                'fecha_vencimiento' => Carbon::now()->addDays(rand(1, 30)),
                'project_id' => $projects->random()->id,
                'user_id' => 1,
            ]);
        }
    }
}
