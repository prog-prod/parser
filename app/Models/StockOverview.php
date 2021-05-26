<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockOverview extends Model
{
    use HasFactory;

    protected $fillable = [
    	"stock_id",
    	"isOtc",
		"symbol",
		"securityId",
		"lastSale",
		"change",
		"percentChange",
		"tickCode",
		"tickName",
		"volume",
		"volumeFormatted",
		"lastTradeTime",
		"quoteTime",
		"quoteDateTime",
		"insideTime",
		"bidPrice",
		"bidSize",
		"askPrice",
		"askSize",
		"dailyHigh",
		"dailyLow",
		"openingPrice",
		"annualHigh",
		"annualLow",
		"dividend",
		"eps",
		"previousClose",
		"peRatio",
		"yield",
		"betaCoefficient",
		"exchangeCode",
		"exchangeName",
		"delay",
		"isADR",
		"realtime",
		"pinkLinkRealtime",
		"thirtyDaysAvgVol",
		"showRealtimeAd",
		"marketCap",
		"sharesOutstanding",
		"adr",
		"isProfileVerified",
		"profileVerifiedAsOfDate"
    ];

    public function history()
    {
        return $this->hasMany(StockOverviewHistory::class);
    }
}
