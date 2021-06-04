<?php

namespace App\Models;

use App\Traits\BaseTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockOverview extends Model
{
    use HasFactory;
    use BaseTrait;

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
        return $this->hasMany(StockOverviewHistory::class,'stock_overview_id','id');
    }

    public function getDiffColumns(){
        $stock_overview = $this->toArray();
        unset($stock_overview['id'],$stock_overview['created_at'],$stock_overview['updated_at']);
        $history = $this->history->last()
            ?  $this->history->last()->toArray()
            : [];
        if(!$history) return [];

        return array_diff($stock_overview, $history);
    }
}
