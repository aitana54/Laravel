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
        return true; // Validar la autorización se verá en sesiones posteriores
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
}
