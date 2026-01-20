<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Crear requiere usuario autenticado (además del auth:sanctum en rutas)
        return $this->user() !== null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:120'],
            'species' => ['required', 'string', 'max:50'],
            'age' => ['nullable', 'integer', 'min:0', 'max:30'],
            'status' => ['required', 'in:available,pending,adopted'],
            'description' => ['nullable', 'string'],

            'created_by' => ['nullable', 'integer', 'exists:users,id'],
            'adopted_by' => ['nullable', 'integer', 'exists:users,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'species.required' => 'La especie es obligatoria.',
            'status.in' => 'El estado debe ser: available, pending o adopted.',
            'created_by.exists' => 'El usuario creador no existe.',
            'adopted_by.exists' => 'El usuario adoptante no existe.',
        ];
    }
}
