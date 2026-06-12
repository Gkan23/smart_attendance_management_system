<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Empleado
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white shadow rounded p-6">
            <form method="POST"
                action="{{ route('employees.update', $employee) }}">

                @csrf
                @method('PUT')

                @include('employees._form')

                <div class="mt-6 flex justify-end">
                    <button type="submit"
                        class="px-4 py-2 bg-green-600 text-white rounde hover:bg-green-700">
                        Acutalizar
                    </button>
                </div>

            </form>

        </div>

        </div>
    </div>

</x-app-layout>