<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StocksHistoryResource extends JsonResource
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
            'price' => number_format($this->price,2, '.', ','),
            'securityName' => $this->securityName,
            'market' => $this->market,
            'securityType' => $this->securityType,
            'country' => $this->country,
            'pct1Day' => number_format($this->pct1Day,2, '.', ','),
            'shortInterest' => number_format($this->shortInterest,2, '.', ','),
            'shortInterestPercent' =>number_format($this->shortInterestPercent,2, '.', ','),
            'volume' => number_format($this->volume,2, '.', ','),
            'isBank' => $this->isBank,
            'overview' => new StockOverviewResource($this->overview),
            'companyProfile' => new StockCompanyProfileResource($this->companyProfile),
    //            'news' => StockNewsResource::collection($this->news),
//            'corporateActions' => StockCorporateActionsResource::collection($this->corporateActions)
            'created_at' => $this->created_at->format('d.m.Y H:i:s')
        ];
    }
}
