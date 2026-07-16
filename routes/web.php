<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// RUTA TEMPORAL PARA INSTALAR LA BASE DE DATOS EN INFINITYFREE
Route::get('/instalar-bd', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('migrate:fresh', [
            '--force' => true,
            '--seed' => true // opcional, si tienes seeders
        ]);
        return '¡Base de datos instalada correctamente en InfinityFree! Ya puedes ir al /dashboard';
    } catch (\Exception $e) {
        return 'Error al instalar: ' . $e->getMessage();
    }
});

Route::get('/dashboard', function () {
    $projects = \App\Models\Project::with('materials')->get();
    
    // Line chart: Progress (Avance)
    $progressLabels = $projects->pluck('nombre');
    $progressData = $projects->pluck('avance');

    // Bar chart: Budget vs Real Cost
    $budgetLabels = $projects->pluck('nombre');
    $budgetData = $projects->pluck('presupuesto');
    $realCostData = $projects->map(function ($project) {
        return $project->materials->sum(function ($material) {
            return $material->stock * $material->costo_unitario;
        });
    });

    // Donut chart: Material Cost Distribution
    $materials = \App\Models\Material::all();
    $materialCosts = [];
    foreach($materials as $material) {
        $cost = $material->stock * $material->costo_unitario;
        if (!isset($materialCosts[$material->nombre])) {
            $materialCosts[$material->nombre] = 0;
        }
        $materialCosts[$material->nombre] += $cost;
    }
    
    $materialLabels = array_keys($materialCosts);
    $materialData = array_values($materialCosts);

    return view('dashboard', compact(
        'projects',
        'progressLabels', 'progressData', 
        'budgetLabels', 'budgetData', 'realCostData',
        'materialLabels', 'materialData'
    ));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('projects', ProjectController::class);
    Route::resource('users', \App\Http\Controllers\UserController::class);
    Route::resource('materials', \App\Http\Controllers\MaterialController::class);
});

require __DIR__.'/auth.php';
