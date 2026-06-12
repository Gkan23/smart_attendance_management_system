<div class="w-64 bg-white shadow min-h-screen">

    <div class="p-4 border-b">
        <h2 class="font-bold text-lg">
            SAMS
        </h2>
    </div>

    <nav class="p-4">
        
        <ul class="space-y-2">
            
            <li>
                <a href="{{ route('dashboard') }}"
                    class="bloc px-4 py-2 rounded hover:bg-gray-100">
                    Dashboard
                </a>
            </li>

            <li>
                <a href="{{ route('employees.index') }}"
                    class="bloc px-4 py-2 rounded hover:bg-gray-100">
                    Empleados
                </a>
            </li>
            
                        <li>
                <a href="{{ route('departments.index') }}"
                    class="bloc px-4 py-2 rounded hover:bg-gray-100">
                    Departamentos
                </a>
            </li>

                        <li>
                <a href="{{ route('positions.index') }}"
                    class="bloc px-4 py-2 rounded hover:bg-gray-100">
                    Cargos
                </a>
            </li>

                        <li>
                <a href="{{ route('work-schedules.index') }}"
                    class="bloc px-4 py-2 rounded hover:bg-gray-100">
                    Horarios
                </a>
            </li>

                        <li>
                <a href="{{ route('attendances.index') }}"
                    class="bloc px-4 py-2 rounded hover:bg-gray-100">
                    Asistencias
                </a>
            </li>

                        <li>
                <a href="{{ route('incident-types.index') }}"
                    class="bloc px-4 py-2 rounded hover:bg-gray-100">
                    Tipos de Incidencia
                </a>
            </li>

                        <li>
                <a href="{{ route('incidents.index') }}"
                    class="bloc px-4 py-2 rounded hover:bg-gray-100">
                    Incidencias
                </a>
            </li>

        </ul>

    </nav>
    
</div>