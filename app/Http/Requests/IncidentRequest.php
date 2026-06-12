<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IncidentRequest extends FormRequest
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
        return [
            'employee_id' => [
                'required',
                Rule::exists('employees', 'id'),
            ],

            'attendance_id' => [
                'nullable',
                Rule::exists('attendances', 'id'),
            ],

            'incident_type_id' => [
                'required',
                Rule::exists('incident_types', 'id'),
            ],

            'incident_date' => [
                'required',
                'date',
            ],

            'observations' => [
                'nullable',
                'string',
                'max:500',
            ]
        ];
    }

    public function attributes(): array
    {
        return [
            'employee_id' => 'empleado',
            'attendance_id' => 'asistencia',
            'incident_type_id' => 'tipo de incidencia',
            'incident_date' => 'fecha de incidencia',
            'observations' => 'observaciones',
        ];
    }
}
