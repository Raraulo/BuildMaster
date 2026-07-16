<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-primary-500 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Stat cards with Premium Styling -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Projects -->
                <div class="bg-gradient-to-br from-white to-orange-50 dark:from-neutral-800 dark:to-neutral-800 rounded-2xl shadow-md p-6 flex items-center border border-orange-100 dark:border-neutral-700 hover:shadow-lg transition-shadow">
                    <div class="flex-1">
                        <h3 class="text-sm font-semibold text-orange-600 dark:text-orange-400 uppercase tracking-wider">Proyectos Activos</h3>
                        <p class="text-3xl font-extrabold text-neutral-800 dark:text-white mt-1">
                            {{ \App\Models\Project::count() }}
                        </p>
                    </div>
                    <div class="p-3 bg-orange-100 rounded-xl">
                        <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24"><path stroke-linecap="round"
                             stroke-linejoin="round" stroke-width="2"
                             d="M9 12h6M9 16h6M9 8h6"></path></svg>
                    </div>
                </div>

                <!-- Completed Tasks -->
                <div class="bg-gradient-to-br from-white to-green-50 dark:from-neutral-800 dark:to-neutral-800 rounded-2xl shadow-md p-6 flex items-center border border-green-100 dark:border-neutral-700 hover:shadow-lg transition-shadow">
                    <div class="flex-1">
                        <h3 class="text-sm font-semibold text-green-600 dark:text-green-400 uppercase tracking-wider">Tareas Completadas</h3>
                        <p class="text-3xl font-extrabold text-neutral-800 dark:text-white mt-1">
                            {{ \App\Models\Task::where('estado', 'completado')->count() }}
                        </p>
                    </div>
                    <div class="p-3 bg-green-100 rounded-xl">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24"><path stroke-linecap="round"
                             stroke-linejoin="round" stroke-width="2"
                             d="M5 13l4 4L19 7"></path></svg>
                    </div>
                </div>

                <!-- Users -->
                <div class="bg-gradient-to-br from-white to-blue-50 dark:from-neutral-800 dark:to-neutral-800 rounded-2xl shadow-md p-6 flex items-center border border-blue-100 dark:border-neutral-700 hover:shadow-lg transition-shadow">
                    <div class="flex-1">
                        <h3 class="text-sm font-semibold text-blue-600 dark:text-blue-400 uppercase tracking-wider">Usuarios Registrados</h3>
                        <p class="text-3xl font-extrabold text-neutral-800 dark:text-white mt-1">
                            {{ \App\Models\User::count() }}
                        </p>
                    </div>
                    <div class="p-3 bg-blue-100 rounded-xl">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24"><path stroke-linecap="round"
                             stroke-linejoin="round" stroke-width="2"
                             d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zM6 20v-2a4 4 0 014-4h4a4 4 0 014 4v2"></path></svg>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Bar Chart: Presupuesto -->
                <div class="lg:col-span-2 bg-white dark:bg-neutral-800 rounded-2xl shadow-sm p-6 border border-neutral-100 dark:border-neutral-700">
                    <h3 class="text-lg font-bold text-neutral-800 dark:text-gray-100 mb-4">Presupuesto vs Gasto Mensual ($)</h3>
                    <div class="relative h-72 w-full">
                        <canvas id="budgetChart"></canvas>
                    </div>
                </div>

                <!-- Donut Chart: Material Usage -->
                <div class="bg-white dark:bg-neutral-800 rounded-2xl shadow-sm p-6 border border-neutral-100 dark:border-neutral-700">
                    <h3 class="text-lg font-bold text-neutral-800 dark:text-gray-100 mb-4">Uso de Materiales</h3>
                    <div class="relative h-64 w-full">
                        <canvas id="materialsChart"></canvas>
                    </div>
                </div>

                <!-- Line Chart: Project Progress -->
                <div class="lg:col-span-3 bg-white dark:bg-neutral-800 rounded-2xl shadow-sm p-6 border border-neutral-100 dark:border-neutral-700">
                    <h3 class="text-lg font-bold text-neutral-800 dark:text-gray-100 mb-4">Avance Mensual (Obras Completadas)</h3>
                    <div class="relative h-64 w-full">
                        <canvas id="progressChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Recent Projects Table -->
            <div class="bg-white dark:bg-neutral-800 rounded-xl shadow-sm p-6 border border-neutral-100 dark:border-neutral-700">
                <h3 class="text-lg font-semibold text-neutral-700 dark:text-gray-200 mb-4">Proyectos recientes</h3>
                <table class="w-full text-left table-auto">
                    <thead class="bg-neutral-100 dark:bg-neutral-900 text-neutral-600 dark:text-neutral-400">
                        <tr>
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">Nombre</th>
                            <th class="px-4 py-2">Estado</th>
                            <th class="px-4 py-2">Inicio</th>
                            <th class="px-4 py-2">Fin</th>
                        </tr>
                    </thead>
                    <tbody class="text-neutral-800 dark:text-neutral-200">
                        @foreach(\App\Models\Project::latest()->take(5)->get() as $project)
                            <tr class="border-t border-neutral-200 dark:border-neutral-700">
                                <td class="px-4 py-2">{{ $project->id }}</td>
                                <td class="px-4 py-2 font-medium">{{ $project->nombre }}</td>
                                <td class="px-4 py-2">
                                    <span class="px-2 py-1 rounded-full
                                        @if($project->estado === 'pendiente') bg-orange-200 text-orange-800
                                        @elseif($project->estado === 'en_progreso') bg-yellow-200 text-yellow-800
                                        @else bg-green-200 text-green-800 @endif">
                                        {{ ucfirst(str_replace('_', ' ', $project->estado)) }}
                                    </span>
                                </td>
                                <td class="px-4 py-2">{{ \Carbon\Carbon::parse($project->fecha_inicio)->format('d/m/Y') }}</td>
                                <td class="px-4 py-2">{{ \Carbon\Carbon::parse($project->fecha_fin)->format('d/m/Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4 text-right">
                    <a href="{{ route('projects.index') }}" class="text-primary-600 hover:underline">
                        Ver todos los proyectos »
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- Chart.js and Init Script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Configuración de Chart.js
            Chart.defaults.font.family = "'Inter', 'Helvetica Neue', 'Helvetica', 'Arial', sans-serif";
            Chart.defaults.color = '#6b7280'; // text-gray-500

            // 0. Gráfico de Barras (Presupuesto)
            const ctxBudget = document.getElementById('budgetChart').getContext('2d');
            new Chart(ctxBudget, {
                type: 'bar',
                data: {
                    labels: @json($budgetLabels),
                    datasets: [
                        {
                            label: 'Presupuesto ($)',
                            data: @json($budgetData),
                            backgroundColor: '#fbbf24', // amber-400
                            borderRadius: 4
                        },
                        {
                            label: 'Gasto Real ($)',
                            data: @json($realCostData),
                            backgroundColor: '#f97316', // orange-500
                            borderRadius: 4
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'top' },
                        tooltip: { mode: 'index', intersect: false }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: { borderDash: [4, 4], color: '#f3f4f6' }
                        },
                        x: {
                            grid: { display: false }
                        }
                    }
                }
            });

            // 1. Gráfico de Dona (Materiales)
            const ctxMaterials = document.getElementById('materialsChart').getContext('2d');
            new Chart(ctxMaterials, {
                type: 'doughnut',
                data: {
                    labels: @json($materialLabels),
                    datasets: [{
                        data: @json($materialData),
                        backgroundColor: [
                            '#f97316', // orange-500
                            '#fbbf24', // amber-400
                            '#34d399', // emerald-400
                            '#60a5fa', // blue-400
                            '#a78bfa'  // violet-400
                        ],
                        borderWidth: 0,
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'bottom' }
                    },
                    cutout: '70%'
                }
            });

            // 2. Gráfico de Líneas (Avance Mensual)
            const ctxProgress = document.getElementById('progressChart').getContext('2d');
            new Chart(ctxProgress, {
                type: 'line',
                data: {
                    labels: @json($progressLabels),
                    datasets: [{
                        label: 'Avance (%)',
                        data: @json($progressData),
                        borderColor: '#f97316', // orange-500
                        backgroundColor: 'rgba(249, 115, 22, 0.1)',
                        borderWidth: 3,
                        pointBackgroundColor: '#fff',
                        pointBorderColor: '#f97316',
                        pointBorderWidth: 2,
                        pointRadius: 4,
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 100,
                            grid: { borderDash: [4, 4], display: true, color: '#f3f4f6' },
                            ticks: { stepSize: 20 }
                        },
                        x: {
                            grid: { display: false }
                        }
                    }
                }
            });
        });
    </script>
</x-app-layout>
