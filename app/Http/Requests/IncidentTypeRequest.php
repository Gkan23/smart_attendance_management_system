<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IncidentTypeRequest extends FormRequest
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
        $incidentTypeId = $this->route('incidents_type')?->id;

        return [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:100',
                Rule::unique('incident_types', 'name')->ignore($incidentTypeId),
            ],

            'description' => [
                'nullable',
                'string',
                'max:255'
            ]
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'nombre',
            'description' => 'descripcion',
        ];
    }
}
