<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Empleados
        </h2>
    </x-slot>

    <div c;ass="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Mensaje --}}
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Boton --}}
            <div class="mb-4 flex justify-end">
                <a href="{{ route('employees.create') }}"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Nuevo Empleado
                </a>
            </div>

            {{-- Tabla --}}
            <div class="bg-white shadow rounde overflow-hidden">

                <table class="w-full text-left">

                    <thead class="bg-gray-50 border-b">
                        <tr>
                            <th class="px-6 py-3">Nombre</th>
                            <th class="px-6 py-3">Cedula</th>
                            <th class="px-6 py-3">Departamento</th>
                            <th class="px-6 py-3">Cargo</th>
                            <th class="px-6 py-3">Estado</th>
                            <th class="px-6 py-3">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($employees as $employee)

                            <tr class="border-b hover:bg-gray-50">

                                <td class="px-6 py-3">
                                    {{ $employee->name }} {{ $employee->surname }}
                                </td>

                                <td class="px-6 py-3">
                                    {{ $employee->identity_document }}
                                </td>

                                <td class="px-6 py-3">
                                    {{ $employee->department->name }}
                                </td>

                                <td class="px-6 py-3">
                                    {{ $employee->position->name ?? '—' }}
                                </td>

                                <td class="px-6 py-3">
                                    <span class="{{ $employee->status == 'ACTIVE' ? 'text-green-600' : 'text-red-600' }}">
                                        {{ $employee->status }}
                                    </span>
                                </td>

                                <td class="px-6 py-3 gap-3">

                                    <div class="flex items-center gap-3">
                                    
                                        <a href="{{ route('employees.show', $employee) }}"
                                            class="text-blue-800 hover:underline">
                                            Ver
                                        </a>
                                        
                                        <a href="{{ route('employees.edit', $employee) }}"
                                            class="text-blue-600 hover:underline">
                                            Editar
                                        </a>
                                        
                                        <form method="POST" 
                                            action="{{ route('employees.destroy', $employee) }}"
                                            onsubmit="return confirm('Eliminar empleado?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="text-red-600 hover:underline">
                                                Eliminar
                                            </button>                                  

                                        </form>

                                    </div>
                                </td>

                            </tr>
                        
                        @empty

                            <tr>
                                <td colspan="6" class="px-6 py-6 text-center text-gray-500">
                                    No hay empleados registrados
                                </td>
                            </tr>
                        
                        @endforelse

                    </tbody>

                </table>

            </div>


        </div>
    </div>

</x-app-layout>