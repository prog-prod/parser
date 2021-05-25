<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id' => (int) $this->id,
            'email' => (string) $this->email,
            'name' => (string) $this->name,
            'role' => (string) $this->role->value,
            'stock_filter' => new UserStockFilterResource($this->stockFilter),
            'telegram_id' => (int) $this->telegram_id ?: null,
            'send_telegram' => (bool) $this->send_telegram,
            'send_email' => (bool) $this->send_email
        ];
    }
}
