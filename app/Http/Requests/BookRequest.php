<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'isbn' => ['nullable'],
            'author' => ['nullable'],
            'description' => ['nullable'],
            'published_date' => ['nullable', 'date'],
            'total_pages' => ['nullable', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
