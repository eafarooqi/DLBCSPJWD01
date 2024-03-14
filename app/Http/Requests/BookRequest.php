<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'max:191'],
            'isbn' => ['nullable', 'max:191'],
            'author' => ['nullable', 'max:191'],
            'description' => ['nullable'],
            'published_date' => ['nullable', 'date'],
            'total_pages' => ['nullable', 'integer', 'gt:0'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
