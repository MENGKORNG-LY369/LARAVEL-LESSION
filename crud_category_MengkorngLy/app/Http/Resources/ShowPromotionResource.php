<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowPromotionResource extends JsonResource
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
            'discount' => $this->discount, 
            'created_at' => $this->created_at, 
            'updated_at' => $this->updated_at,
            'products' => ShowProductCategoryResource::collection($this->products) ?? null,
            'products_count' => $this->products->count(),
        ];
    }
}
