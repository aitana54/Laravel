<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
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
        return [
            'content' => ['required', 'string', 'max:120'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],

            'user_id' => ['nullable', 'integer', 'exists:users,id'],
            'book_id' => ['nullable', 'integer', 'exists:books,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'content.required' => 'El contenido de la reseña es obligatoria.',
            'rating.required' => 'La puntuación del libro es obligatoria.',

            'user_id.exists' => 'El usuario autor de la reseña no existe.',
            'book_id.exists' => 'El libro al que se asocia la reseña no existe.',
        ];
    }
}
