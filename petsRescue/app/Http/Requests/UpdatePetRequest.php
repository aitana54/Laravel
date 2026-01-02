<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Validar la autorización se verá en sesiones posteriores
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // "sometimes" significa: Valida este campo solo si el campo existe en la petición."
        return [
            'name' => ['sometimes', 'required', 'string', 'max:120'],
            'species' => ['sometimes', 'required', 'string', 'max:50'],
            'age' => ['sometimes', 'nullable', 'integer', 'min:0', 'max:30'],
            'status' => ['sometimes', 'required', 'in:available,pending,adopted'],
            'description' => ['sometimes', 'nullable', 'string'],

            'created_by' => ['sometimes', 'nullable', 'integer', 'exists:users,id'],
            'adopted_by' => ['sometimes', 'nullable', 'integer', 'exists:users,id'],
        ];
    }
    public function messages(): array
    {
        return [
            'status.in' => 'El estado debe ser: available, pending o adopted.',
            'created_by.exists' => 'El usuario creador no existe.',
            'adopted_by.exists' => 'El usuario adoptante no existe.',
        ];
    }
}
