<?php

namespace App\Models;

use App\Traits\BaseTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StocksHistory extends Model
{
    use HasFactory;
    use BaseTrait;

    protected $table = 'stocks_history';
    public $timestamps = true;

    protected $fillable = [
        "stock_id",
    	"securityId",
		"reportDate",
		"symbol",
		"securityName",
		"market",
		"marketId",
		"securityType",
		"country",
		"state",
		"forexCountry",
		"caveatEmptor",
		"industryId",
		"industry",
		"volume",
		"volumeChange",
		"dividendYield",
		"dividendPayer",
		"morningStarRating",
		"penny",
		"price",
		"shortInterest",
		"shortInterestPercent",
		"shortInterestRatio",
		"pct1Day",
		"pct5Day",
		"pct4Weeks",
		"pct13Weeks",
		"pct52Weeks",
		"isBank",
		"perfQxComp4Weeks",
		"perfQxComp13Weeks",
		"perfQxComp52Weeks",
		"perfQxBillion4Weeks",
		"perfQxBillion13Weeks",
		"perfQxBillion52Weeks",
		"perfQxBanks4Weeks",
		"perfQxBanks13Weeks",
		"perfQxBanks52Weeks",
		"perfQxIntl4Weeks",
		"perfQxIntl13Weeks",
		"perfQxIntl52Weeks",
		"perfQxUs4Weeks",
		"perfQxUs13Weeks",
		"perfQxUs52Weeks",
		"perfQb4Weeks",
		"perfQb13Weeks",
		"perfQb52Weeks",
		"perfSp4Weeks",
		"perfSp13Weeks",
		"perfSp52Weeks",
		"perfQxDiv4Weeks",
		"perfQxDiv13Weeks",
		"perfQxDiv52Weeks",
		"perfQxCan4Weeks",
		"perfQxCan13Weeks",
		"perfQxCan52Weeks"
    ];

    public function overview()
    {
        return $this->hasOne(StockOverviewHistory::class);
    }

    public function news()
    {
        return $this->hasMany(StockNewsHistory::class);
    }

    public function corporateActions()
    {
        return $this->hasMany(StockCorporateActionHistory::class);
    }

    public function companyProfile()
    {
        return $this->hasOne(StockCompanyProfileHistory::class);
    }
    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
}
