<?php

namespace App\Http\Resources\Products;

use App\Http\Resources\Category\CategoryResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowProductResource extends JsonResource
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
            'price' => $this->price, 
            'quantity' => $this->quantity, 
            'category' => CategoryResource::collection($this->categories)
        ];
    }
}