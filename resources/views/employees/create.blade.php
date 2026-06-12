<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear Empleado
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px lg:px-8">

            <div class="bg-white shadow rounded p-6">

                <form method="POST" action="{{ route('employees.store') }}">
                    @csrf

                    @include('employees._form')

                    <div class="mt-6 flex justify-end">
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Guardar                        
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>