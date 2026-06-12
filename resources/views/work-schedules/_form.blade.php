    <div>
        <label for="name" class="block text-sm font-medium text-gray-700">
            Nombre del Horario
        </label>

        <input 
        type="text"
        name="name"
        id="name"
        value="{{  old('name', $workSchedule->name ?? '') }}"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">

        @error('name')
            <p class="mt-1 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror
    </div>

    <div>
        <label for="start_time" class="block text-sm font-medium text-gray-700">
            Hora de Entrada
        </label>

        <input 
        type="time"
        name="start_time"
        id="start_time"
        value="{{  old('start_time', isset($workSchedule) ? substr($workSchedule->start_time, 0, 5) : '') }}"
        class="mt-1 block w-full rounde-md border-gray-300 shadow-sm">

        @error('start_time')
            <p class="mt-1 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror
    </div>

    <div>
        <label for="end_time" class="block text-sm font-medium text-gray-700">
            Hora de salida
        </label>

        <input 
        type="time"
        name="end_time"
        id="end_time"
        value="{{ old('end_time', isset($workSchedule) ? substr($workSchedule->end_time, 0, 5) : '') }}"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">

        @error('end_time')
            <p class="mt-1 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror
    </div>

    <div>
        <label for="break_minutes" class="block text-sm font-medium text-gray-700">
            Minutos de descanso
        </label>

        <input 
        type="number"
        name="break_minutes"
        id="break_minutes"
        min="0"
        max="240"
        value="{{ old('break_minutes', $workSchedule->break_minutes ?? '') }}"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">

        @error('break_minutes')
            <p class="mt-1 text-sm text-red-600">
                {{ $message }}
            </p>
        @enderror
    </div>