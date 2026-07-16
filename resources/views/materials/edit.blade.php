<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-primary-500 leading-tight">
            {{ __('Editar Material: ') }} {{ $material->nombre }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-neutral-800 rounded-2xl shadow-sm border border-neutral-100 dark:border-neutral-700 overflow-hidden">
                <div class="p-8">
                    <form action="{{ route('materials.update', $material) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 gap-6">
                            <!-- Nombre -->
                            <div>
                                <label for="nombre" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300">Nombre del Material</label>
                                <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $material->nombre) }}" class="mt-1 block w-full rounded-md border-neutral-300 dark:border-neutral-600 dark:bg-neutral-700 dark:text-white shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-3 border" required>
                                @error('nombre') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Descripción -->
                            <div>
                                <label for="descripcion" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300">Descripción</label>
                                <textarea name="descripcion" id="descripcion" rows="4" class="mt-1 block w-full rounded-md border-neutral-300 dark:border-neutral-600 dark:bg-neutral-700 dark:text-white shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-3 border">{{ old('descripcion', $material->descripcion) }}</textarea>
                                @error('descripcion') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Stock -->
                                <div>
                                    <label for="stock" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300">Stock (Cantidad)</label>
                                    <input type="number" name="stock" id="stock" value="{{ old('stock', $material->stock) }}" class="mt-1 block w-full rounded-md border-neutral-300 dark:border-neutral-600 dark:bg-neutral-700 dark:text-white shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-3 border" required min="0">
                                    @error('stock') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>

                                <!-- Unidad de Medida -->
                                <div>
                                    <label for="unidad_medida" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300">Unidad de Medida</label>
                                    <input type="text" name="unidad_medida" id="unidad_medida" value="{{ old('unidad_medida', $material->unidad_medida) }}" placeholder="Ej: Sacos, Metros, Piezas" class="mt-1 block w-full rounded-md border-neutral-300 dark:border-neutral-600 dark:bg-neutral-700 dark:text-white shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-3 border" required>
                                    @error('unidad_medida') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                                <!-- Proyecto/Obra -->
                                <div>
                                    <label for="project_id" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300">Proyecto/Obra</label>
                                    <select name="project_id" id="project_id" class="mt-1 block w-full rounded-md border-neutral-300 dark:border-neutral-600 dark:bg-neutral-700 dark:text-white shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-3 border">
                                        <option value="">-- Ninguno / General --</option>
                                        @foreach($projects as $project)
                                            <option value="{{ $project->id }}" {{ old('project_id', $material->project_id) == $project->id ? 'selected' : '' }}>
                                                {{ $project->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('project_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>

                                <!-- Costo Unitario -->
                                <div>
                                    <label for="costo_unitario" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300">Costo Unitario ($)</label>
                                    <input type="number" name="costo_unitario" id="costo_unitario" step="0.01" min="0" value="{{ old('costo_unitario', $material->costo_unitario) }}" class="mt-1 block w-full rounded-md border-neutral-300 dark:border-neutral-600 dark:bg-neutral-700 dark:text-white shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-3 border" required>
                                    @error('costo_unitario') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 flex justify-end space-x-3">
                            <a href="{{ route('materials.index') }}" class="bg-neutral-200 dark:bg-neutral-700 hover:bg-neutral-300 dark:hover:bg-neutral-600 text-neutral-800 dark:text-neutral-200 font-semibold py-2 px-4 rounded-lg transition">
                                Cancelar
                            </a>
                            <button type="submit" class="bg-primary-500 hover:bg-primary-600 text-white font-bold py-2 px-6 rounded-lg shadow-md transition">
                                Actualizar Material
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
