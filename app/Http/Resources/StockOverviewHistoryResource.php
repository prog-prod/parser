<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StockOverviewHistoryResource extends JsonResource
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
            "id" => $this->id,
            "stock_id" => $this->stock_id,
            "isOtc" => $this->isOtc,
            "symbol" => $this->symbol,
            "securityId" => $this->securityId,
            "lastSale" => $this->lastSale,
            "change" => $this->change,
            "percentChange" => $this->percentChange,
            "tickCode" => $this->tickCode,
            "tickName" => $this->tickName,
            "volume" => $this->volume,
            "volumeFormatted" => $this->volumeFormatted,
            "lastTradeTime" => $this->lastTradeTime,
            "quoteTime" => $this->quoteTime,
            "quoteDateTime" => $this->quoteDateTime,
            "insideTime" => $this->insideTime,
            "bidPrice" => $this->bidPrice,
            "bidSize" => $this->bidSize,
            "askPrice" => $this->askPrice,
            "askSize" => $this->askSize,
            "dailyHigh" => $this->dailyHigh,
            "dailyLow" => $this->dailyLow,
            "openingPrice" => $this->openingPrice,
            "annualHigh" => $this->annualHigh,
            "annualLow" => $this->annualLow,
            "dividend" => $this->dividend,
            "eps" => $this->eps,
            "previousClose" => $this->previousClose,
            "peRatio" => $this->peRatio,
            "yield" => $this->yield,
            "betaCoefficient" => $this->betaCoefficient,
            "exchangeCode" => $this->exchangeCode,
            "exchangeName" => $this->exchangeName,
            "delay" => $this->delay,
            "isADR" => $this->isADR,
            "realtime" => $this->realtime,
            "pinkLinkRealtime" => $this->pinkLinkRealtime,
            "thirtyDaysAvgVol" => $this->thirtyDaysAvgVol,
            "showRealtimeAd" => $this->showRealtimeAd,
            "marketCap" => $this->marketCap,
            "sharesOutstanding" => $this->sharesOutstanding,
            "adr" => $this->adr
        ];
    }
}
