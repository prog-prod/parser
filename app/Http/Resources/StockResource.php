<?php

namespace App\Http\Resources;

use App\Models\StocksHistory;
use Illuminate\Http\Resources\Json\JsonResource;

class StockResource extends JsonResource
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
            'id' => $this->id,
            'symbol' => $this->symbol,
            'price' => $this->price,
            'securityName' => $this->securityName,
            'market' => $this->market,
            'securityType' => $this->securityType,
            'country' => $this->country,
            'pct1Day' => $this->pct1Day,
            'shortInterest' => $this->shortInterest,
            'shortInterestPercent' => $this->shortInterestPercent,
            'volume' => $this->volume,
            'isBank' => $this->isBank,
            'isViewed' => $this->isViewed(),
            'overview' => new StockOverviewResource($this->overview),
            'history' => StocksHistoryResource::collection($this->history),
            'companyProfile' => new StockCompanyProfileResource($this->companyProfile),
            'corporateActions' => StockCorporateActionsResource::collection($this->corporateActions),
            'created_at' => $this->created_at->format('d.m.Y H:i:s')
        ];
    }
}
