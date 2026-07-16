<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-primary-500 leading-tight">
            {{ __('Usuarios del Sistema') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-neutral-800 rounded-xl shadow-sm overflow-hidden border border-neutral-100 dark:border-neutral-700">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold text-neutral-700 dark:text-gray-100 mb-4">Listado de Usuarios</h3>
                    <table class="w-full text-left table-auto">
                        <thead class="bg-neutral-100 dark:bg-neutral-900 border-b border-neutral-200 dark:border-neutral-700">
                            <tr>
                                <th class="px-4 py-3 font-medium text-neutral-600 dark:text-neutral-300">ID</th>
                                <th class="px-4 py-3 font-medium text-neutral-600 dark:text-neutral-300">Nombre</th>
                                <th class="px-4 py-3 font-medium text-neutral-600 dark:text-neutral-300">Email</th>
                                <th class="px-4 py-3 font-medium text-neutral-600 dark:text-neutral-300">Rol</th>
                                <th class="px-4 py-3 font-medium text-neutral-600 dark:text-neutral-300 text-right">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-neutral-100 dark:divide-neutral-700">
                            @forelse($users as $user)
                                <tr class="hover:bg-neutral-50 dark:hover:bg-neutral-800/50 transition-colors text-neutral-800 dark:text-neutral-200">
                                    <td class="px-4 py-3">{{ $user->id }}</td>
                                    <td class="px-4 py-3 font-medium">{{ $user->name }}</td>
                                    <td class="px-4 py-3 text-sm text-neutral-500 dark:text-neutral-400">{{ $user->email }}</td>
                                    <td class="px-4 py-3">
                                        <span class="px-2 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800 dark:bg-blue-900/50 dark:text-blue-300">
                                            Admin
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-right flex justify-end space-x-2">
                                        @if($user->email !== 'admin@example.com' || auth()->user()->email === 'admin@example.com')
                                            <a href="{{ route('users.edit', $user) }}" class="text-primary-500 hover:text-primary-700 dark:text-primary-400 dark:hover:text-primary-300 font-medium">Editar</a>
                                        @endif
                                        @if(auth()->user()->email === 'admin@example.com' && $user->email !== 'admin@example.com')
                                            <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('¿Seguro que deseas eliminar este usuario?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 font-medium">Borrar</button>
                                            </form>
                                        @elseif($user->email === 'admin@example.com')
                                            <span class="text-neutral-400 dark:text-neutral-500 font-medium cursor-not-allowed" title="El admin principal no puede ser eliminado">Protegido</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-4 py-8 text-center text-neutral-500 dark:text-neutral-400">
                                        No hay usuarios registrados.
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
