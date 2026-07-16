<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-primary-500 leading-tight">
            {{ __('Editar Proyecto: ') }} {{ $project->nombre }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-neutral-800 rounded-2xl shadow-sm border border-neutral-100 dark:border-neutral-700 overflow-hidden">
                <div class="p-8">
                    <form action="{{ route('projects.update', $project) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 gap-6">
                            <!-- Nombre -->
                            <div>
                                <label for="nombre" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300">Nombre del Proyecto</label>
                                <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $project->nombre) }}" class="mt-1 block w-full rounded-md border-neutral-300 dark:border-neutral-600 dark:bg-neutral-700 dark:text-white shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-3 border" required>
                                @error('nombre') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Descripción -->
                            <div>
                                <label for="descripcion" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300">Descripción</label>
                                <textarea name="descripcion" id="descripcion" rows="4" class="mt-1 block w-full rounded-md border-neutral-300 dark:border-neutral-600 dark:bg-neutral-700 dark:text-white shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-3 border">{{ old('descripcion', $project->descripcion) }}</textarea>
                                @error('descripcion') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <!-- Estado -->
                                <div>
                                    <label for="estado" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300">Estado</label>
                                    <select name="estado" id="estado" class="mt-1 block w-full rounded-md border-neutral-300 dark:border-neutral-600 dark:bg-neutral-700 dark:text-white shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-3 border">
                                        <option value="pendiente" {{ old('estado', $project->estado) === 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                        <option value="en_progreso" {{ old('estado', $project->estado) === 'en_progreso' ? 'selected' : '' }}>En Progreso</option>
                                        <option value="completado" {{ old('estado', $project->estado) === 'completado' ? 'selected' : '' }}>Completado</option>
                                    </select>
                                    @error('estado') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>

                                <!-- Fecha Inicio -->
                                <div>
                                    <label for="fecha_inicio" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300">Fecha de Inicio</label>
                                    <input type="date" name="fecha_inicio" id="fecha_inicio" value="{{ old('fecha_inicio', \Carbon\Carbon::parse($project->fecha_inicio)->format('Y-m-d')) }}" class="mt-1 block w-full rounded-md border-neutral-300 dark:border-neutral-600 dark:bg-neutral-700 dark:text-white shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-3 border" required>
                                    @error('fecha_inicio') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>

                                <!-- Fecha Fin -->
                                <div>
                                    <label for="fecha_fin" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300">Fecha de Finalización</label>
                                    <input type="date" name="fecha_fin" id="fecha_fin" value="{{ old('fecha_fin', \Carbon\Carbon::parse($project->fecha_fin)->format('Y-m-d')) }}" class="mt-1 block w-full rounded-md border-neutral-300 dark:border-neutral-600 dark:bg-neutral-700 dark:text-white shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-3 border" required>
                                    @error('fecha_fin') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                                <!-- Presupuesto -->
                                <div>
                                    <label for="presupuesto" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300">Presupuesto Asignado ($)</label>
                                    <input type="number" name="presupuesto" id="presupuesto" step="0.01" min="0" value="{{ old('presupuesto', $project->presupuesto) }}" class="mt-1 block w-full rounded-md border-neutral-300 dark:border-neutral-600 dark:bg-neutral-700 dark:text-white shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-3 border" required>
                                    @error('presupuesto') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>

                                <!-- Avance -->
                                <div>
                                    <label for="avance" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300">Avance Inicial (%)</label>
                                    <input type="number" name="avance" id="avance" min="0" max="100" value="{{ old('avance', $project->avance) }}" class="mt-1 block w-full rounded-md border-neutral-300 dark:border-neutral-600 dark:bg-neutral-700 dark:text-white shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-3 border" required>
                                    @error('avance') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 flex justify-end space-x-3">
                            <a href="{{ route('projects.index') }}" class="bg-neutral-200 dark:bg-neutral-700 hover:bg-neutral-300 dark:hover:bg-neutral-600 text-neutral-800 dark:text-neutral-200 font-semibold py-2 px-4 rounded-lg transition">
                                Cancelar
                            </a>
                            <button type="submit" class="bg-primary-500 hover:bg-primary-600 text-white font-bold py-2 px-6 rounded-lg shadow-md transition">
                                Actualizar Proyecto
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
