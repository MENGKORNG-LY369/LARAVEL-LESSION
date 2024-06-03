<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PromotionResource extends JsonResource
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
            'products' => ShowProductCategoryResource::collection($this->products) ?? null,
            'products_count' => $this->products->count(),
        ];
    }
}
