<?php

namespace App\Http\Requests;

class CategoryRequest extends DefaultRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:categories|min:8|max:100',
            'description' => 'required|string|unique:categories|min:15|max:255',
        ];
    }
}