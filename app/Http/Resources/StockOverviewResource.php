<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StockOverviewResource extends JsonResource
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
            "bidPrice" => number_format($this->bidPrice ?? 0, 2, '.', ','),
            "bidSize" => $this->bidSize,
            "askPrice" => number_format($this->askPrice ?? 0, 2, '.', ','),
            "askSize" => $this->askSize,
            "dailyHigh" => number_format($this->dailyHigh ?? 0, 2, '.', ','),
            "dailyLow" => number_format($this->dailyLow ?? 0, 2, '.', ','),
            "openingPrice" => number_format($this->openingPrice ?? 0, 2, '.', ','),
            "annualHigh" => number_format($this->annualHigh ?? 0, 2, '.', ','),
            "annualLow" => number_format($this->annualLow ?? 0, 2, '.', ','),
            "dividend" => number_format($this->dividend, 2, '.', ','),
            "eps" => $this->eps,
            "previousClose" => $this->previousClose,
            "peRatio" => $this->peRatio,
            "yield" => number_format($this->yield, 2, '.', ','),
            "betaCoefficient" => $this->betaCoefficient,
            "exchangeCode" => $this->exchangeCode,
            "exchangeName" => $this->exchangeName,
            "delay" => $this->delay,
            "isADR" => $this->isADR,
            "realtime" => $this->realtime,
            "pinkLinkRealtime" => $this->pinkLinkRealtime,
            "thirtyDaysAvgVol" => number_format($this->thirtyDaysAvgVol, 0, '', ','),
            "showRealtimeAd" => $this->showRealtimeAd,
            "marketCap" => number_format($this->marketCap, 0, '', ','),
            "sharesOutstanding" => number_format($this->sharesOutstanding, 0, '', ','),
            "adr" => $this->adr,
            "history" => StockOverviewResource::collection($this->history)
        ];
    }
}
