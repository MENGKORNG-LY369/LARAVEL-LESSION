<?php

namespace App\Http\Requests\Categories;

use App\Http\Requests\DefaultRequest;

class StoreCategoryRequest extends DefaultRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:categories,name'
        ];
    }
}
