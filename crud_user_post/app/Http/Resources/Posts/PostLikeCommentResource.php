<?php

namespace App\Http\Resources\Posts;

use App\Http\Resources\Comments\CommentResource;
use App\Http\Resources\Like\LikeResource;
use App\Http\Resources\Users\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostLikeCommentResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'image' => 'http://127.0.0.1:8000/storage/images/posts/'.$this->media->image,
            'author' => new UserResource($this->user),
            'comments' => CommentResource::collection($this->comments),
            'likes' => LikeResource::collection($this->likes)
        ];
    }
}
