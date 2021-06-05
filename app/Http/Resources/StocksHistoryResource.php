<?php

namespace App\Http\Resources;

use App\Models\StockCompanyProfileHistory;
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
            'price' => $this->price,
            'securityName' => $this->securityName,
            'market' => $this->market,
            'securityType' => $this->securityType,
            'country' => $this->country,
            'pct1Day' => $this->pct1Day,
            'shortInterest' => $this->shortInterest,
            'shortInterestPercent' =>$this->shortInterestPercent,
            'volume' => $this->volume,
            'isBank' => $this->isBank,
//            'overview' => new StockOverviewHistoryResource($this->overview),
//            'companyProfile' => new StockCompanyProfileHistoryResource($this->companyProfile),
    //            'news' => StockNewsResource::collection($this->news),
//            'corporateActions' => StockCorporateActionsResource::collection($this->corporateActions)
            'created_at' => $this->created_at->format('d.m.Y H:i:s')
        ];
    }
}
