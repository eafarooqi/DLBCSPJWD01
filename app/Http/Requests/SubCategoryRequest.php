<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required|max:191'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
