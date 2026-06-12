<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Horarios de Trabajo
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif
            
            <div class="mb-4 flex justify-end">
                <a href="{{ route('work-schedules.create') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Nuevo Horario
                </a>
            </div>

            <div class="bg-white shadow rounded overflow-hidden">

                <table class="w-full text-left">

                    <thead class="bg-gray-50 border-b">
                        <tr>
                            <th class="px-6 py-3 text-sm font-medium text-gray-600">
                                Nombre
                            </th>

                            <th class="px-6 py-3 text-sm font-medium text-gray-600">
                                Entrada
                            </th>

                            <th class="px-6 py-3 text-sm font-medium text-gray-600">
                                Salida
                            </th>

                            <th class="px-6 py-3 text-sm font-medium text-gray-600">
                                Descanso
                            </th>

                            <th class="px-6 py-3 text-sm font-medium text-gray-600">
                                Horas Diarias
                            </th>

                            <th class="px-6 py-3 text-sm font-medium text-gray-600">
                                Fecha
                            </th>

                            <th class="px-6 py-3 text-sm font-medium text-gray-600">
                                Acciones
                            </th>                          
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($workSchedules as $workSchedule)
                            
                            <tr class="border-b hover:bg-gray-50">
                                
                                <td class="px-6 py-3 font-medium text-gray-900">
                                    {{ $workSchedule->name }}
                                </td>

                                <td class="px-6 py-3 text-gray-600">
                                    {{ \Carbon\Carbon::parse($workSchedule->start_time)->format('H:i') }}
                                </td>

                                <td class="px-6 py-3 text-gray-600">
                                    {{ \Carbon\Carbon::parse($workSchedule->end_time)->format('H:i') }}
                                </td>

                                <td class="px-6 py-3 text-gray-600">
                                    {{ $workSchedule->break_minutes }} min
                                </td>

                                <td class="px-6 py-3 text-gray-600">
                                    {{ number_format($workSchedule->daily_hours, 2) }} h
                                </td>

                                <td class="px-6 py-3 text-gray-600">
                                    {{ $workSchedule->created_at->format('d/m/Y') }}
                                </td>

                                <td class="px-6 py-3 flex gap-3">
                                    <a href="{{ route('work-schedules.edit', $workSchedule) }}"
                                    class="text-blue-600 hover:underline">
                                    Editar
                                    </a>

                                    <form method="POST"
                                        action="{{ route('work-schedules.destroy', $workSchedule) }}"
                                        onsubmit="return confirm('Eliminar este horario?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="text-red-600 hover:underline">
                                            Eliminar
                                        </button>

                                    </form>

                                </td>

                            </tr>
                        
                        @empty

                            <tr>
                                <td colspan="7"
                                    class="px-6 py-6 text-center text-gray-500">
                                    No hay horarios registrados
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</x-app-layout>