<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Reglas básicas
    |--------------------------------------------------------------------------
    */

    'required' => 'El campo :attribute es obligatorio',
    'string' => 'El campo :attribute debe ser una cadena de texto',
    'numeric' => 'El campo :attribute debe ser un valor numérico',
    'integer' => 'El campo :attribute debe ser un número entero',
    'boolean' => 'El campo :attribute debe ser verdadero o falso',

    /*
    |--------------------------------------------------------------------------
    | Longitudes y límites
    |--------------------------------------------------------------------------
    */

    'max' => [
        'string' => 'El campo :attribute no debe superar :max caracteres',
        'numeric' => 'El valor de :attribute no debe ser mayor a :max',
        'file' => 'El archivo :attribute no debe superar :max kilobytes',
        'array' => 'El campo :attribute no debe tener más de :max elementos',
    ],

    'min' => [
        'string' => 'El campo :attribute debe tener al menos :min caracteres',
        'numeric' => 'El valor de :attribute debe ser al menos :min',
        'file' => 'El archivo :attribute debe tener al menos :min kilobytes',
        'array' => 'El campo :attribute debe tener al menos :min elementos',
    ],

    /*
    |--------------------------------------------------------------------------
    | Base de datos (integridad referencial)
    |--------------------------------------------------------------------------
    */

    'unique' => 'El :attribute ya está registrado en el sistema',
    'exists' => 'El valor seleccionado en :attribute no es válido o no existe',

    /*
    |--------------------------------------------------------------------------
    | Fechas y horas (CRÍTICO para Attendance y WorkSchedule)
    |--------------------------------------------------------------------------
    */

    'date' => 'El campo :attribute debe ser una fecha válida',
    'date_format' => 'El campo :attribute no cumple el formato requerido (:format)',

    'after' => 'El campo :attribute debe ser posterior a :date',
    'after_or_equal' => 'El campo :attribute debe ser posterior o igual a :date',

    'before' => 'El campo :attribute debe ser anterior a :date',
    'before_or_equal' => 'El campo :attribute debe ser anterior o igual a :date',

    /*
    |--------------------------------------------------------------------------
    | Horarios (reglas de negocio del sistema SAMS)
    |--------------------------------------------------------------------------
    */

    'in' => 'El valor seleccionado en :attribute no es válido',

    /*
     * útil para status, tipos de incidencia, etc.
     */
    'not_in' => 'El valor seleccionado en :attribute no es permitido',

    /*
    |--------------------------------------------------------------------------
    | Email y comunicación
    |--------------------------------------------------------------------------
    */

    'email' => 'El campo :attribute debe ser un correo electrónico válido',

    /*
    |--------------------------------------------------------------------------
    | Archivos (si luego agregas exportaciones o importaciones Excel)
    |--------------------------------------------------------------------------
    */

    'file' => 'El campo :attribute debe ser un archivo válido',
    'mimes' => 'El archivo :attribute debe ser de tipo: :values',
    'mimetypes' => 'El archivo :attribute debe ser de tipo válido',

    /*
    |--------------------------------------------------------------------------
    | Lógica de listas y estructuras
    |--------------------------------------------------------------------------
    */

    'distinct' => 'El campo :attribute contiene valores duplicados',
    'array' => 'El campo :attribute debe ser un arreglo válido',

    /*
    |--------------------------------------------------------------------------
    | Seguridad y consistencia
    |--------------------------------------------------------------------------
    */

    'confirmed' => 'La confirmación de :attribute no coincide',

];