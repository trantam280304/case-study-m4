<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = parent::toArray($request);
        $data['image']          = asset($this->image);
        $data['price_fm']       = number_format($this->price);
        $data['category_name']  = $this->category->name;
        $data['category']       = $this->category;
        return $data;
    }
}
