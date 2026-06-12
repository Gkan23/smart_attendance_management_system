<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detalle del Empleado
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Datos Personales --}}
            <div class="bg-white shadow rounded p-6">

                <h3 class="text-lg font-semibold text-gray-700 mb-4">
                    Datos Personales
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div>
                        <p class="text-sm text-gray-500">Nombre completo</p>
                        <p class="font-medium">
                            {{ $employee->name }} {{ $employee->surname }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Cedula</p>
                        <p class="font-medium">
                            {{ $employee->identity_document }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Fecha de nacimiento</p>
                        <p class="font-medium">
                            {{ \Carbon\Carbon::parse($employee->birthdate)->format('d/m/Y') }}
                        </p>
                    </div>

                </div>
            </div>

            {{-- Contacto --}}
            <div class="bg-white shadow rounded p-6">

                <h3 class="text-lg font-semibold text-gray-700 mb-4">
                    Contacto
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div>
                        <p class="text-sm text-gray-500">Correo electronico</p>
                        <p class="font-medium">{{ $employee->email }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Telefono</p>
                        <p class="font-medium">{{ $employee->phone_number }}</p>
                    </div>

                    <div class="md:col-span-2">
                        <p class="text-sm text-gray-500">Direccion</p>
                        <p class="font-medium">{{ $employee->address }}</p>
                    </div>

                </div>
            </div>

            {{-- Informacion Laboral --}}
            <div class="bg-white shadow rounded p-6">

                <h3 class="text-lg font-semibold text-gray-700 mb-4">
                    Informacion Laboral
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div>
                        <p class="text-sm text-gray-500">Departamento</p>
                        <p class="font-medium">
                            {{ $employee->department->name ?? '—' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Cargo</p>
                        <p class="font-medium">
                            {{ $employee->position->name ?? '—' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Horario</p>
                        <p class="font-medium">
                            {{ $employee->schedule->name ?? '—' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Estado</p>

                        @if($employee->status === 'ACTIVE')
                            <span class="inline-block px-2 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded">
                                ACTIVO
                            </span>
                        @else
                            <span class="inline-block px-2 py-1 text-xs font-semibold text-red-700 bg-red-100 rounded">
                                INACTIVO
                            </span>
                        @endif
                    </div>

                    <div>
                        <p class="text-sm text-gray-500">Fecha de contratacion</p>
                        <p class="font-medium">
                            {{ \Carbon\Carbon::parse($employee->hire_date)->format('d/m/Y') }}
                        </p>
                    </div>

                </div>
            </div>

            {{-- Boton volver --}}
            <div class="flex justify-end">
                <a href="{{ route('employees.index') }}"
                   class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                    Volver
                </a>
            </div>

        </div>
    </div>

</x-app-layout>

