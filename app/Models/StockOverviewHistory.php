<?php

namespace App\Models;

use App\Traits\BaseTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockOverviewHistory extends Model
{
    use HasFactory;
    use BaseTrait;

    protected $table = 'stock_overviews_history';
    public $timestamps = true;

    protected $fillable = [
        "stock_overview_id",
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
}
