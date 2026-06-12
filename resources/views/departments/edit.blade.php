<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Departamento
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto">

            <div class="bg-white shadow rounde p-6">

                <form method="POST"
                    action="{{ route('departments.update', $department) }}">

                    @csrf
                    @method('PUT')

                    @include('departments._form')

                    <div class="mt-6 flex justify-end">
                        <button
                            type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded">
                            Actualizar
                        </button>
                    </div>

                </form>

            </div>
            
        </div>
    </div>
</x-app-layout>