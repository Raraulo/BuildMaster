<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-primary-500 leading-tight">
            {{ __('Crear Nuevo Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-neutral-800 rounded-2xl shadow-sm border border-neutral-100 dark:border-neutral-700 overflow-hidden">
                <div class="p-8">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        
                        <div class="grid grid-cols-1 gap-6">
                            <!-- Nombre -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300">Nombre Completo</label>
                                <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-neutral-300 dark:border-neutral-600 dark:bg-neutral-700 dark:text-white shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-3 border" required>
                                @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300">Correo Electrónico</label>
                                <input type="email" name="email" id="email" class="mt-1 block w-full rounded-md border-neutral-300 dark:border-neutral-600 dark:bg-neutral-700 dark:text-white shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-3 border" required>
                                @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Password -->
                                <div>
                                    <label for="password" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300">Contraseña</label>
                                    <input type="password" name="password" id="password" class="mt-1 block w-full rounded-md border-neutral-300 dark:border-neutral-600 dark:bg-neutral-700 dark:text-white shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-3 border" required>
                                    @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </div>

                                <!-- Confirm Password -->
                                <div>
                                    <label for="password_confirmation" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300">Confirmar Contraseña</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 block w-full rounded-md border-neutral-300 dark:border-neutral-600 dark:bg-neutral-700 dark:text-white shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm p-3 border" required>
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 flex justify-end space-x-3">
                            <a href="{{ route('users.index') }}" class="bg-neutral-200 dark:bg-neutral-700 hover:bg-neutral-300 dark:hover:bg-neutral-600 text-neutral-800 dark:text-neutral-200 font-semibold py-2 px-4 rounded-lg transition">
                                Cancelar
                            </a>
                            <button type="submit" class="bg-primary-500 hover:bg-primary-600 text-white font-bold py-2 px-6 rounded-lg shadow-md transition">
                                Guardar Usuario
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
