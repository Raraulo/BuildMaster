<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-primary-500 leading-tight">
            {{ __('Materiales de Construcción') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-neutral-800 shadow-sm sm:rounded-lg border border-neutral-100 dark:border-neutral-700">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold text-neutral-800 dark:text-gray-100">Lista de Materiales</h3>
                    </div>
                    <table class="w-full text-left table-auto">
                        <thead class="bg-neutral-100 dark:bg-neutral-900 border-b border-neutral-200 dark:border-neutral-700">
                            <tr>
                                <th class="px-4 py-3 font-medium text-neutral-600 dark:text-neutral-300">ID</th>
                                <th class="px-4 py-3 font-medium text-neutral-600 dark:text-neutral-300">Nombre</th>
                                <th class="px-4 py-3 font-medium text-neutral-600 dark:text-neutral-300">Descripción</th>
                                <th class="px-4 py-3 font-medium text-neutral-600 dark:text-neutral-300">Proyecto</th>
                                <th class="px-4 py-3 font-medium text-neutral-600 dark:text-neutral-300">Stock/Unidad</th>
                                <th class="px-4 py-3 font-medium text-neutral-600 dark:text-neutral-300">Costo Unit.</th>
                                <th class="px-4 py-3 font-medium text-neutral-600 dark:text-neutral-300 text-right">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-neutral-100 dark:divide-neutral-700">
                            @forelse($materials as $material)
                                <tr class="hover:bg-neutral-50 dark:hover:bg-neutral-800/50 transition-colors text-neutral-800 dark:text-neutral-200">
                                    <td class="px-4 py-3">{{ $material->id }}</td>
                                    <td class="px-4 py-3 font-medium">{{ $material->nombre }}</td>
                                    <td class="px-4 py-3 text-neutral-500 dark:text-neutral-400">{{ Str::limit($material->descripcion, 30) }}</td>
                                    <td class="px-4 py-3 text-sm font-medium text-primary-600 dark:text-primary-400">
                                        {{ $material->project ? $material->project->nombre : 'General' }}
                                    </td>
                                    <td class="px-4 py-3 font-bold">{{ $material->stock }} <span class="text-xs font-normal text-neutral-500 dark:text-neutral-400">{{ $material->unidad_medida }}</span></td>
                                    <td class="px-4 py-3 text-sm">${{ number_format($material->costo_unitario, 2) }}</td>
                                    <td class="px-4 py-3 text-right flex justify-end space-x-2">
                                        <a href="{{ route('materials.edit', $material) }}" class="text-primary-500 hover:text-primary-700 font-medium">Editar</a>
                                        @if(auth()->user()->email === 'admin@example.com')
                                            <form action="{{ route('materials.destroy', $material) }}" method="POST" class="inline" onsubmit="return confirm('¿Seguro que deseas eliminar este material?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700 font-medium">Borrar</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-4 py-8 text-center text-neutral-500">
                                        No hay materiales registrados.
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
