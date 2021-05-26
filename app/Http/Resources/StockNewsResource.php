<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StockNewsResource extends JsonResource
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
            'original_id' => (int)  $this->original_id,
            'stock_id' => (int) $this->stock_id,
            'companyId' => (int) $this->companyId ?: null,
            'userId' => (int) $this->userId ?: null,
            'title' => (string) $this->title ?: null,
            'content' => (string) $this->content ?: null,
            'typeId' => (string) $this->content ?: null,
            'statusId' => (string) $this->content ?: null,
            'location' => (string) $this->content ?: null,
            'isImmediate' => (string) $this->content ?: null,
            'createdDate' => (string) $this->content ?: null,
            'lastModifiedDate' => (string) $this->content ?: null,
            'releaseDate' => (string) $this->content ?: null,
            'canDistribute' => (string) $this->content ?: null,
            'wasDistributed' => (string) $this->content ?: null,
            'newsTypeDescript' => (string) $this->content ?: null,
            'statusDescript' => (string) $this->content ?: null,
            'sourceId' => (string) $this->content ?: null,
            'displayDateTime' => (string) $this->content ?: null,
            'display' => (bool) $this->display ?: null,
            'isItemFromExternalProvider' => (bool) $this->isItemFromExternalProvider ?: null,
            'immediate' => (bool) $this->immediate ?: null,
            'symbol' => (string) $this->symbol ?: null,
        ];
    }
}
