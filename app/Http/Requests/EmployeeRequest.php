<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $employeeId = $this->route('employee')?->id;

        return [
            
            'name' => [
                'required',
                'string',
                'min:3',
                'max:50',
            ], 

            'surname' => [
                'required',
                'string',
                'min:3',
                'max:50',
            ],

            'identity_document' => [
                'required',
                'string',
                'max:15',
                Rule::unique('employees', 'identity_document')->ignore($employeeId),
            ],

            'birthdate' => [
                'required',
                'date',
            ],

            'email' => [
                'required',
                'email',
                Rule::unique('employees', 'email')->ignore($employeeId),
            ],

            'address' => [
                'required',
                'string',
                'min:3',
                'max:225',
            ],

            'phone_number' => [
                'required',
                'string',
                'max:20',
            ],

            'hire_date' => [
                'required',
                'date',
            ],

            'status' =>[
                'required', 
                Rule::in(['ACTIVE', 'INACTIVE']),
            ], 

            'department_id' => [
                'required', 
                Rule::exists('departments', 'id'),
            ],

            'position_id' => [
                'reqUired',
                Rule::exists('positions', 'id'),
            ], 

            'schedule_id' => [
                'required',
                Rule::exists('work_schedules', 'id'),
            ],

        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'nombre',
            'surname' => 'apellido',
            'identity_document' => 'cedula',
            'birthdate' => 'fecha de nacimiento',
            'email' => 'correo electronico',
            'address' => 'direccion',
            'phone_number' => 'telefono',
            'hire_date' => 'fecha de contratacion',
            'status' => 'estado',
            'department_id' => 'departamento',
            'position_id' => 'cargo',
            'schedule_id' => 'horario',
        ];
    }
}
