<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Cargos
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Mensaje de exito -->
             @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Boton crear -->
            <div class="mb-4 flex justify-end">
                <a href="{{ route('positions.create') }}"                
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Nuevo Cargo
                </a>
            </div>

            <!-- Tabla -->
            <div class="bg-white shadow rounded overflow-hidden">

                <table class="w-full text-left">

                    <thead class="bg-gray-50 border-b">
                        <tr>
                            <th class="px-6 py-3 text-sm font-medium text-gray-600">Nombre</th>
                            <th class="px-6 py-3 text-sm font-medium text-gray-600">Descripcion</th>
                            <th class="px-6 py-3 text-sm font-medium text-gray-600">Fecha</th>
                            <th class="px-6 py-3 text-sm font-medium text-gray-600">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        
                        @forelse($positions as $position)

                            <tr class="border-b hover:bg-gray-50">

                                <td class="px-6 py-3 font-medium text-gray-900">
                                    {{ $position->name }}
                                </td>

                                <td class="px-6 py-3 text-gray-600">
                                    {{ $position->description ?? '—' }}
                                </td>

                                <td class="px-6 py-3 text-gray-600">
                                    {{ $position->created_at->format('d/m/Y') }}
                                </td>

                                <td class="px-6 py-3 flex gap-3">
                                    
                                    <a href="{{ route('positions.edit', $position) }}"
                                        class="text-blue-600 hover:underline">
                                        Editar
                                    </a>

                                    <form method="POST"
                                        action="{{ route('positions.destroy', $position) }}"
                                        onsubmit="return confirm('Eliminar este cargo?')">

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
                                <td colspan="4" class="px-6 py-6 text-center text-gray-500">
                                    No hay cargos registrados
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</x-app-layout>