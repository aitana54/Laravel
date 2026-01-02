<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:120'],
            'author' => ['required', 'string', 'max:120'],
            'genre' => ['required', 'string', 'max:100'],
            'total_pages' => ['required', 'integer', 'min:49', 'max:100000'],
            'status' => ['required', 'in:available,reading,finished'],
            'summary' => ['nullable', 'integer', 'min:150', 'max:200'],

            'add_by_user_id' => ['nullable', 'integer', 'exists:users,id'],
            'currently_reading_user_id' => ['nullable', 'integer', 'exists:users,id'],
        ];
    }
}
