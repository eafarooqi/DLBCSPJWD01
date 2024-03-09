<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required|max:191'],
            'parent_id' => ['nullable|integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
