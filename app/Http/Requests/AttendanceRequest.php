<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AttendanceRequest extends FormRequest
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
            
            'attendance_date' => [
                'required',
                'date',
            ],
            
            'check_in_time' => [
                'nullable',
                'date_format:H:i',
            ],

            'check_out_time' => [
                'nullable',
                'date_format:H:i',
                'after:check_in_time',
            ],
        ];
    }

    public function attributes(): array
    {
        return [
            'employee_id' => 'empleado', 
            'attendance_date' => 'fecha de asistencia',
            'check_in_time' => 'hora de entrada',
            'check_out_time' => 'hora de salida',
        ];
    }
}
