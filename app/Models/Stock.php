<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
    	"id",
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

    public function scopePriceRange($query, $range)
    {
        return $query->whereBetween('price', $range);
    }

    public function overview()
    {
        return $this->hasOne(StockOverview::class, 'stock_id', 'id');
    }

    public function history()
    {
        return $this->hasMany(StocksHistory::class, 'stock_id', 'id');
    }

    public function news()
    {
        return $this->hasMany(StockNews::class, 'stock_id', 'id');
    }

    public function corporateActions()
    {
        return $this->hasMany(StockCorporateAction::class, 'stock_id', 'id');
    }

    public function companyProfile()
    {
        return $this->hasOne(StockCompanyProfile::class, 'stock_id', 'id');
    }

    public static function getAllWithFilter($data){

        $stockFilter = auth()->user()->stockFilter;

        $price_range = $stockFilter->getPricesRange($data['price_min'] ?? null, $data['price_max'] ?? null);


        $stocks = Stock::priceRange($price_range)
            ->orderBy($data['column'] ?? 'created_at', $data['order'] ?? 'desc');

        if(isset($data['market'])){
            $stocks->where('market', $data['market']);
        }
        if(isset($data['country'])){
            $stocks->where('country', $data['country']);
        }
        if(isset($data['symbol'])){
            $stocks->where('symbol', 'like', '%'.trim($data['symbol']).'%');
        }

        return $stocks->paginate($data['per_page'] ?? 20);
    }

//    public function isUpdated(){
//        return $this->updatedStocks()
//            ? $this->updated_at >  $this->history()->latest()->updated_at
//            : false;
//    }
    private function getDiffColumns(){

        $stock_data = $this->makeHidden(['id', 'created_at', 'updated_at'])->getRawOriginal();
        unset($stock_data['id'],$stock_data['created_at'],$stock_data['updated_at']);
        $stock_history = $this->history->last() ? $this->history->last()->toArray() : null;

        if(!$stock_history) return [];

        return array_diff($stock_data, $stock_history);
    }
    public function getUpdatedColumns()
    {

       $stock_diff = $this->getDiffColumns();
       $stock_overview_diff = $this->addPrefixToKeys($this->overview->getDiffColumns(),'overview');
       $stock_company_profile_diff = $this->addPrefixToKeys($this->companyProfile->getDiffColumns(),'companyProfile');

       $stock_news = $this->news->last();
       $stock_news_diff =  $this->news
           ? $this->addPrefixToKeys($stock_news->getDiffColumns(),'news')
           : [];

       $corporateActions = $this->corporateActions->last();

       $stock_corporate_action_diff = $corporateActions
           ? $this->addPrefixToKeys($corporateActions->getDiffColumns(), 'corporateActions')
           : [];


        return array_merge(
            $stock_diff,
            $stock_overview_diff,
//            $stock_company_profile_diff,
            $stock_corporate_action_diff,
            $stock_news_diff
        );

    }

    private function addPrefixToKeys($array,$prefix,$glue = '.')
    {
        $array_result = [];
        foreach($array as $key => $value){
            $array_result[$prefix.$glue.$key] = $value;
        }
        return $array_result;
    }
}


