<?php

namespace App\Http\Requests\Posts;

use App\Http\Requests\DefaultRequest;

class StorePostRequest extends DefaultRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'user_id' => 'required|exists:users,id',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000'
        ];
    }
}
