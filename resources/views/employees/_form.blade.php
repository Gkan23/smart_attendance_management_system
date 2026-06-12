{{-- Datos personales --}}
<div class="bg-white shadow rounded p-6 mb-6">
    <h3 class="text-lg font-semibold text-gray-700 mb-4">
        Datos personales
    </h3>
    

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

        <div>
            <label class="block text-sm font-medium text-gray-700">Nombre</label>

            <input type="text" name="name"
                value="{{ old('name', $employee->name ?? '') }}"
                class="mt-1 w-full rounded-md border-gray-300 shadow-sm">

            @error('name')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Apellido</label>
            
            <input type="text" name="surname"
                value="{{ old('surname', $employee->surname ?? '') }}"
                class="mt-1 w-full rounded-md border-gray-300 shadow-sm">
                
            @error('surname')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
            </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Numero de Cedula (sin guiones)</label>
            
            <input type="text" name="identity_document"
                value="{{ old('identity_document', $employee->identity_document ?? '') }}"
                class="mt-1 w-full rounded-md border-gray-300 shadow-sm">

            @error('identity_document')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Fecha de Nacimiento</label>
            
            <input type="date" name="birthdate"
                value="{{ old('birthdate', $employee->birthdate ?? '') }}"
                class="mt-1 w-full rounded-md border-gray-300 shadow-sm">

            @error('birthdate')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

    </div>
</div>

{{-- Contacto --}}
<div class="bg-white shadow rounded p-6 mb-6">
    <h3 class="text-lg font-semibold text-gray-700 mb-4">
        Contacto
    </h3>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        
        <div>
            <label class="block text-sm font-medium text-gray-700">Correo electronico</label>
            
            <input type="email" name="email"
                value="{{ old('email', $employee->email ?? '') }}"
                class="mt-1 w-full rounded-md border-gray-300 shadow-sm">

            @error('email')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Telefono</label>
            
            <input type="text" name="phone_number"
                value="{{ old('phone_number', $employee->phone_number ?? '') }}"
                class="mt-1 w-full rounded-md border-gray-300 shadow-sm">

            @error('phone_number')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700">Direccion</label>
            
            <input type="text" name="address"
                value="{{ old('address', $employee->address ?? '') }}"
                class="mt-1 w-full rounded-md border-gray-300 shadow-sm">

            @error('address')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

    </div>
</div>

{{-- Informacion Laboral --}}
<div class="bg-white shadow rounded p-6 mb-6">
    <h3 class="text-lg font-semibold text-gray-700 mb-4">
        Informacion Laboral
    </h3>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        
        <div>
            <label class="block text-sm font-medium text-gray-700">Fecha de Contratacion</label>
            
            <input type="date" name="hire_date"
                value="{{ old('hire_date', $employee->hire_date ?? '') }}"
                class="mt-1 w-full rounded-md border-gray-300 shadow-sm">

            @error('hire_date')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Estado</label>
            
            <select name="status"
                class="mt-1 w-full rounded-md border-gray-300 shadow-sm">

                <option value="ACTIVE"
                    {{ old('status', $employee->status ?? '') == 'ACTIVE' ? 'selected' : '' }}>
                    Activo
                </option>

                <option value="INACTIVE"
                    {{ old('status', $employee->status ?? '') == 'INACTIVE' ? 'selected' : '' }}>
                    Inactivo
                </option>
            </select>

            @error('status')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>


        <div>
            <label class="block text-sm font-medium text-gray-700">Departamento (Area)</label>
            
            <select name="department_id"
                class="mt-1 w-full rounded-md border-gray-300 shadow-sm">

                @foreach($departments as $department)
                    <option value="{{ $department->id }}"
                        {{ old('department_id', $employee->department_id ?? '') == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>

            @error('department_id')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Cargo</label>
            
            <select name="position_id"
                class="mt-1 w-full rounded-md border-gray-300 shadow-sm">

                @foreach($positions as $position)
                    <option value="{{ $position->id }}"
                        {{ old('position_id', $employee->position_id ?? '') == $position->id ? 'selected' : '' }}>
                        {{ $position->name }}
                    </option>
                @endforeach
            </select>

            @error('position_id')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700">Horario</label>
            
            <select name="schedule_id"
                class="mt-1 w-full rounded-md border-gray-300 shadow-sm">

                @foreach($workSchedules as $schedule)
                    <option value="{{ $schedule->id }}"
                        {{ old('schedule_id', $employee->schedule_id ?? '') == $schedule->id ? 'selected' : '' }}>
                        {{ $schedule->name }}
                    </option>
                @endforeach
            </select>

            @error('schedule_id')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>


    </div>
</div>


