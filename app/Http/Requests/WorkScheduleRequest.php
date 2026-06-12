<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WorkScheduleRequest extends FormRequest
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
        $scheduleId = $this->route('work_schedule')?->id;

        return [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:100',
                Rule::unique('work_schedules', 'name')->ignore($scheduleId),
            ],

            'start_time' => [
                'required',
                'date_format:H:i',
            ],

            'end_time' => [
                'required',
                'date_format:H:i',
                'after:start_time',
            ],

            'break_minutes' => [
                'required',
                'integer',
                'min:0',
                'max:240',
            ],


        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'nombre',
            'start_time' => 'hora de entrada',
            'end_time' => 'hora de salida',
            'break_minutes' => 'minutos de descanso',
        ];
    }
}
