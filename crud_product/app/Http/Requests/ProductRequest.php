<?php

namespace App\Http\Requests;

class ProductRequest extends DefaultRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string|unique:products|max:100|min:5',
            'price' => 'integer|min:1|max:500',
            'quantity' => 'integer|max:500|min:1',
            'category_id' => 'integer|exists:categories,id'
        ];
    }
}
