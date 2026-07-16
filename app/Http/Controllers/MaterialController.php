<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materials = \App\Models\Material::with('project')->get();
        return view('materials.index', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = \App\Models\Project::all();
        return view('materials.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'unidad_medida' => 'required|string|max:50',
            'project_id' => 'nullable|exists:projects,id',
            'costo_unitario' => 'required|numeric|min:0',
        ]);

        \App\Models\Material::create($validated);

        return redirect()->route('materials.index')->with('success', 'Material creado exitosamente.');
    }

    public function show(\App\Models\Material $material)
    {
        return view('materials.show', compact('material'));
    }

    public function edit(\App\Models\Material $material)
    {
        $projects = \App\Models\Project::all();
        return view('materials.edit', compact('material', 'projects'));
    }

    public function update(Request $request, \App\Models\Material $material)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'unidad_medida' => 'required|string|max:50',
            'project_id' => 'nullable|exists:projects,id',
            'costo_unitario' => 'required|numeric|min:0',
        ]);

        $material->update($validated);

        return redirect()->route('materials.index')->with('success', 'Material actualizado exitosamente.');
    }

    public function destroy(\App\Models\Material $material)
    {
        $material->delete();
        return redirect()->route('materials.index')->with('success', 'Material eliminado exitosamente.');
    }
}
