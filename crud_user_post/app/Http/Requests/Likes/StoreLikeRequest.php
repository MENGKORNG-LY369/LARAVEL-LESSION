<?php

namespace App\Http\Requests\Likes;

use App\Http\Requests\DefaultRequest;

class StoreLikeRequest extends DefaultRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|integer|exists:users,id',
            'post_id' => 'required|integer|exists:posts,id',
            'like_count' => 'required|integer|max:1'
        ];
    }
}
