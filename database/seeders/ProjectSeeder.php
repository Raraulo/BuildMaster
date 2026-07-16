<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use Carbon\Carbon;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $states = ['pendiente', 'en_progreso', 'completado'];
        foreach (range(1, 5) as $i) {
            Project::create([
                'nombre' => "Proyecto $i",
                'descripcion' => "Descripción del proyecto $i",
                'estado' => $states[array_rand($states)],
                'fecha_inicio' => Carbon::now()->subDays(rand(1, 30)),
                'fecha_fin' => Carbon::now()->addDays(rand(10, 60)),
                'user_id' => 1,
            ]);
        }
    }
}
