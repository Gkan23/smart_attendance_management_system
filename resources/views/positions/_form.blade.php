<div>
    <label for="name" class="block text-sm font-medium text-gray-700">
        Nombre del Cargo
    </label>

    <input 
        type="text"
        name="name"
        id="name"
        value="{{ old('name', $department->name ?? '') }}"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">

        @error('name')
            <p class="mt-1 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror
</div>

<div>
    <label for="description" class="block text-sm font-medium text-gray-700">
        Descripcion
    </label>

    <textarea 
        name="description"
        id="description"
        rows="3"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
    </textarea>

        @error('description')
            <p class="mt-1 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror
</div>