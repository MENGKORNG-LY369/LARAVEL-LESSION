<?php

namespace App\Http\Resources\Like;

use App\Http\Resources\Posts\PostResource;
use App\Http\Resources\Users\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LikeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user' => new UserResource($this->user),
            'post' => new PostResource($this->post),
            'like_count' => $this->like_count
        ];
    }
}
