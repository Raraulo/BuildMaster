<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Dark Mode Init Script -->
        <script>
            if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        </script>
    </head>
    <body class="font-sans antialiased text-gray-900 dark:text-gray-100 bg-gray-50 dark:bg-gray-900 transition-colors duration-200">
        <div class="flex h-screen overflow-hidden">
            <!-- Sidebar -->
            <aside class="w-64 bg-neutral-900 text-white flex flex-col hidden md:flex shrink-0 transition-colors">
                <div class="h-16 flex items-center px-6 border-b border-neutral-800">
                    <!-- Laravel Logo SVG -->
                    <svg class="w-8 h-8 text-primary-500 mr-3 shrink-0" viewBox="0 0 50 52" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M49.626 11.564a.809.809 0 01.028.209v10.972a.8.8 0 01-.402.694l-9.209 5.302V39.25a.8.8 0 01-.402.694L20.42 51.01c-.044.025-.092.041-.14.058-.018.006-.035.017-.054.022a.805.805 0 01-.41 0c-.022-.006-.042-.018-.063-.026-.044-.016-.09-.03-.132-.054L.402 39.944A.8.8 0 010 39.25V6.334a.8.8 0 01.028-.209c.006-.023.02-.044.028-.067a.8.8 0 01.054-.128c.014-.023.033-.042.05-.064.022-.025.04-.054.066-.076.022-.02.05-.034.075-.051.025-.02.047-.044.074-.06h.002L9.89.312a.8.8 0 01.798 0l9.513 5.49h.002c.027.017.05.04.074.06.025.017.053.03.075.051.026.022.044.05.066.076.017.022.036.041.05.064.022.042.038.084.054.128.008.023.022.044.028.067a.83.83 0 01.028.209v20.559l8.01-4.612V11.772a.83.83 0 01.029-.209c.006-.023.02-.044.028-.067a.801.801 0 01.054-.128c.014-.023.033-.042.05-.064.022-.025.04-.054.066-.076.022-.02.05-.034.075-.051.025-.02.047-.044.074-.06h.002l9.513-5.49a.8.8 0 01.798 0l9.513 5.49c.029.017.051.04.076.06.024.017.051.03.073.051.024.022.044.05.066.076.017.022.036.041.05.064.022.042.038.084.054.128.008.023.022.044.028.067zM48.017 22.06V12.89l-3.363 1.936-4.646 2.676v9.17l8.01-4.612zm-9.609 16.504V29.39l-4.572 2.614-12.846 7.34v9.254l17.418-10.035zM1.598 7.45v31.106l17.418 10.035v-9.254L9.81 33.83c-.027-.016-.05-.04-.074-.058-.025-.02-.053-.032-.075-.053a.801.801 0 01-.066-.076c-.017-.024-.034-.043-.048-.066a.8.8 0 01-.054-.132c-.008-.02-.02-.042-.026-.064a.8.8 0 01-.028-.21V12.063L4.962 9.387 1.598 7.45zm8.69-5.536L2.28 6.326l8.007 4.612 8.006-4.612-8.006-4.412zM13.653 33.2l4.645-2.674V7.45l-3.363 1.936-4.646 2.676v23.076l3.364-1.937zM39.625 7.023l-8.009 4.412 8.01 4.612 8.005-4.612-8.006-4.412zm-.8 10.14l-4.646-2.676-3.363-1.936v9.17l4.645 2.674 3.364 1.938v-9.17zM20.018 44.42l11.622-6.64 5.79-3.308-8.003-4.609-9.209 5.303-8.216 4.734 8.016 4.52z" fill="currentColor"/>
                    </svg>
                    <span class="font-bold text-lg tracking-wide text-white">BuildMaster</span>
                </div>
                
                <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
                    <!-- Dashboard -->
                    <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('dashboard') ? 'bg-primary-500 text-white shadow-md shadow-primary-500/20' : 'text-neutral-300 hover:bg-neutral-800 hover:text-white' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                        Dashboard
                    </a>

                    <!-- Proyectos -->
                    <a href="{{ route('projects.index') }}" class="flex items-center px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('projects.*') ? 'bg-primary-500 text-white shadow-md shadow-primary-500/20' : 'text-neutral-300 hover:bg-neutral-800 hover:text-white' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        Proyectos
                    </a>

                    <!-- Usuarios -->
                    <a href="{{ route('users.index') }}" class="flex items-center px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('users.*') ? 'bg-primary-500 text-white shadow-md shadow-primary-500/20' : 'text-neutral-300 hover:bg-neutral-800 hover:text-white' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        Usuarios
                    </a>

                    <!-- Materiales -->
                    <a href="{{ route('materials.index') }}" class="flex items-center px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('materials.*') ? 'bg-primary-500 text-white shadow-md shadow-primary-500/20' : 'text-neutral-300 hover:bg-neutral-800 hover:text-white' }}">
                        <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                        Materiales
                    </a>
                </nav>

                <!-- Dark Mode Switch + Logout -->
                <div class="p-4 border-t border-neutral-800 space-y-3">
                    <!-- Dark Mode Toggle Switch -->
                    <div class="flex items-center justify-between px-4 py-2">
                        <div class="flex items-center text-neutral-400">
                            <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                            <span class="text-sm">Modo Oscuro</span>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="theme-switch" class="sr-only peer">
                            <div class="w-11 h-6 bg-neutral-700 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-primary-500 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-500"></div>
                        </label>
                    </div>

                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex w-full items-center px-4 py-3 text-neutral-400 hover:text-white hover:bg-neutral-800 rounded-xl transition-colors">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                            Cerrar Sesión
                        </button>
                    </form>
                </div>
            </aside>

            <!-- Main Content Area -->
            <div class="flex-1 flex flex-col h-screen overflow-hidden bg-gray-50 dark:bg-neutral-900 transition-colors">
                
                <!-- Top Header -->
                <header class="h-16 bg-white dark:bg-neutral-800 border-b border-gray-200 dark:border-neutral-700 flex items-center justify-between px-6 shrink-0 transition-colors">
                    
                    <!-- Page Title -->
                    <div class="font-semibold text-xl text-gray-800 dark:text-gray-100">
                        {{ $header ?? '' }}
                    </div>

                    <!-- Right Controls -->
                    <div class="flex items-center space-x-4">
                        <!-- User Dropdown (Simplified) -->
                        <div class="flex items-center">
                            <span class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ Auth::user()->name ?? 'Admin' }}</span>
                            <div class="ml-2 w-8 h-8 rounded-full bg-primary-100 text-primary-600 flex items-center justify-center font-bold">
                                {{ substr(Auth::user()->name ?? 'A', 0, 1) }}
                            </div>
                        </div>
                    </div>
                </header>

                <!-- Page Main Scrollable Area -->
                <main class="flex-1 overflow-y-auto p-6 bg-gray-50 dark:bg-neutral-900 transition-colors relative">
                    {{ $slot }}

                    <!-- Floating Action Button (FAB) - only on index pages -->
                    @if(request()->routeIs('projects.index'))
                        <a href="{{ route('projects.create') }}" class="fixed bottom-8 right-8 w-14 h-14 bg-primary-500 hover:bg-primary-600 text-white rounded-full shadow-lg hover:shadow-xl flex items-center justify-center transition-all duration-200 hover:scale-110 z-50" title="Nuevo Proyecto">
                            <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        </a>
                    @elseif(request()->routeIs('users.index'))
                        <a href="{{ route('users.create') }}" class="fixed bottom-8 right-8 w-14 h-14 bg-primary-500 hover:bg-primary-600 text-white rounded-full shadow-lg hover:shadow-xl flex items-center justify-center transition-all duration-200 hover:scale-110 z-50" title="Nuevo Usuario">
                            <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        </a>
                    @elseif(request()->routeIs('materials.index'))
                        <a href="{{ route('materials.create') }}" class="fixed bottom-8 right-8 w-14 h-14 bg-primary-500 hover:bg-primary-600 text-white rounded-full shadow-lg hover:shadow-xl flex items-center justify-center transition-all duration-200 hover:scale-110 z-50" title="Nuevo Material">
                            <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        </a>
                    @endif
                </main>
            </div>
        </div>

        <!-- Script for Theme Toggle Switch -->
        <script>
            var themeSwitch = document.getElementById('theme-switch');

            // Set initial state based on current theme
            if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                themeSwitch.checked = true;
            }

            themeSwitch.addEventListener('change', function() {
                if (this.checked) {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('theme', 'light');
                }
            });
        </script>
    </body>
</html>
