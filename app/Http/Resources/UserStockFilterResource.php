<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserStockFilterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'user_id' => (int) $this->user_id,
            'min_price' => (float) $this->min_price,
            'max_price' => (float) $this->max_price,
            'categories' => (array) $this->categories
        ];
    }
}
