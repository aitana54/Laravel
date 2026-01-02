<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // "sometimes" significa: Valida este campo solo si el campo existe en la petición."
        return [
            'title' => ['sometimes', 'required', 'string', 'max:120'],
            'author' => ['sometimes', 'required', 'string', 'max:120'],
            'genre' => ['sometimes', 'required', 'string', 'max:100'],
            'total_pages' => ['sometimes', 'required', 'integer', 'min:49', 'max:100000'],
            'status' => ['sometimes', 'required', 'in:available,reading,finished'],
            'summary' => ['sometimes', 'nullable', 'integer', 'min:150', 'max:200'],

            'add_by_user_id' => ['sometimes', 'nullable', 'integer', 'exists:users,id'],
            'currently_reading_user_id' => ['sometimes', 'nullable', 'integer', 'exists:users,id'],
        ];
    }
}
