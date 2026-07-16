<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-primary-500 leading-tight">
            {{ __('Proyectos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-neutral-800 rounded-xl shadow-sm overflow-hidden border border-neutral-100 dark:border-neutral-700">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-neutral-700 dark:text-gray-100 mb-4">Listado de Proyectos</h3>
                    <table class="w-full text-left table-auto">
                        <thead class="bg-neutral-100 dark:bg-neutral-900 border-b border-neutral-200 dark:border-neutral-700">
                            <tr>
                                <th class="px-4 py-3 font-medium text-neutral-600 dark:text-neutral-300">ID</th>
                                <th class="px-4 py-3 font-medium text-neutral-600 dark:text-neutral-300">Nombre</th>
                                <th class="px-4 py-3 font-medium text-neutral-600 dark:text-neutral-300">Descripción</th>
                                <th class="px-4 py-3 font-medium text-neutral-600 dark:text-neutral-300">Estado</th>
                                <th class="px-4 py-3 font-medium text-neutral-600 dark:text-neutral-300">Inicio</th>
                                <th class="px-4 py-3 font-medium text-neutral-600 dark:text-neutral-300 text-right">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-neutral-100 dark:divide-neutral-700">
                            @forelse($projects as $project)
                                <tr class="hover:bg-neutral-50 dark:hover:bg-neutral-800/50 transition-colors text-neutral-800 dark:text-neutral-200">
                                    <td class="px-4 py-3">{{ $project->id }}</td>
                                    <td class="px-4 py-3 font-medium">{{ $project->nombre }}</td>
                                    <td class="px-4 py-3 text-sm text-neutral-500 dark:text-neutral-400 truncate max-w-xs">{{ $project->descripcion }}</td>
                                    <td class="px-4 py-3">
                                        <span class="px-2 py-1 rounded-full text-xs font-semibold
                                            @if($project->estado === 'pendiente') bg-orange-200 text-orange-800
                                            @elseif($project->estado === 'en_progreso') bg-yellow-200 text-yellow-800
                                            @else bg-green-200 text-green-800 @endif">
                                            {{ ucfirst(str_replace('_', ' ', $project->estado)) }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-sm text-neutral-500 dark:text-neutral-400">{{ \Carbon\Carbon::parse($project->fecha_inicio)->format('d/m/Y') }}</td>
                                    <td class="px-4 py-3 text-right flex justify-end space-x-2">
                                        <a href="{{ route('projects.edit', $project) }}" class="text-primary-500 hover:text-primary-700 font-medium">Editar</a>
                                        @if(auth()->user()->email === 'admin@example.com')
                                            <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline" onsubmit="return confirm('¿Seguro que deseas eliminar este proyecto?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700 font-medium">Borrar</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-8 text-center text-neutral-500">
                                        No hay proyectos registrados.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
