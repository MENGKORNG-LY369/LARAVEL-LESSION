<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowCategoryResource extends JsonResource
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
            'name' => $this->name, 
            'description' => $this->description, 
            'created_at' => $this->created_at, 
            'updated_at' => $this->updated_at, 
            'delete_at' => $this->delete_at,
            'products_list' => ShowProductCategoryResource::collection($this->products) ?? null,
            'product_count' => $this->products ? $this->products->count() : 0
        ];
    }
}
