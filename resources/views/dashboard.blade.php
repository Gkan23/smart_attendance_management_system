<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('SAMS Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- KPIs -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <div class="bg-white p-6 shadow rounded">
                    <h3 class="text-gray-500">Total Empleados</h3>
                    <p class="text-2xl font-bold text-gray-900">{{ $totalEmployees }}</p>
                </div>

                <div class="bg-white p-6 shadow rounded">
                    <h3 class="text-gray-500">Activos</h3>
                    <p class="text-2xl font-bold text-green-600">{{ $activeEmployees }}</p>
                </div>

                <div class="bg-white p-6 shadow rounded">
                    <h3 class="text-gray-500">Inactivos</h3>
                    <p class="text-2xl font-bold text-red-600">{{ $inactiveEmployees }}</p>
                </div>

                <div class="bg-white p-6 shadow rounded">
                    <h3 class="text-gray-500">Asistencias Hoy</h3>
                    <p class="text-2xl font-bold text-blue-600">{{ $todayAttendances }}</p>
                </div>

            </div>

            <!-- Incidencias recientes -->
            <div class="mt-8 bg-white shadow rounded p-6">

                <h3 class="text-lg font-semibold mb-4">
                    Incidencias recientes
                </h3>

                <div class="px-6 overflow-x-auto">
                    <table class="w-full text-left">

                        <thead>
                            <tr class="border-b">
                                <th class="py-2">Empleado</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($recentIncidents as $incident)
                                <tr class="border-b">
                                    
                                    <td class="py-2">
                                        {{ $incident->employee->name ?? 'N/A' }}
                                        {{ $incident->employee->surname ?? '' }}
                                    </td>

                                    <td>
                                        {{ $incident->created_at->format('d/m/Y H:i') }}
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="py-4 text-center text-gray-500">
                                        No hay incidencias recientes
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
