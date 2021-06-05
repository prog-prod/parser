<?php

namespace App\Models;

use App\Casts\NumberDotFormatCast;
use App\Traits\BaseTrait;
use App\Traits\StockHistoryTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    use StockHistoryTrait;
    use BaseTrait;

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

    protected $casts = [
        'shortInterest' => NumberDotFormatCast::class,
        'pct1Day' => NumberDotFormatCast::class,
        'shortInterestPercent' => NumberDotFormatCast::class,
        'volume' => NumberDotFormatCast::class,
        'price' => NumberDotFormatCast::class,
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

    public function historyUpdates()
    {
        return $this->hasMany(\App\Models\HistoryUpdate::class);
    }

    public static function getAllWithFilter($data)
    {
        $stocks = Stock::orderBy($data['column'] ?? 'created_at', $data['order'] ?? 'desc');

        if (isset($data['price_min'])) {
            $stocks->where('price_min', '<=', $data['price_min']);
        }

         if (isset($data['price_max'])) {
             $stocks->where('price_max', '<=', $data['price_max']);
         }

        if (isset($data['market'])) {
            $stocks->where('market', $data['market']);
        }
        if (isset($data['country'])){
            $stocks->where('country', $data['country']);
        }
        if (isset($data['symbol'])) {
            $stocks->where('symbol', 'like', '%' . trim($data['symbol']) . '%');
        }

        return $stocks->paginate($data['per_page'] ?? 20);
    }

    private function getDiffColumns()
    {

        $stock_data = $this->makeHidden(['id', 'created_at', 'updated_at'])->getRawOriginal();
        unset($stock_data['id'],$stock_data['created_at'],$stock_data['updated_at']);
        $stock_history = $this->history->last() ? $this->history->last()->toArray() : null;

        if(!$stock_history) return [];

        return array_diff($stock_data, $stock_history);
    }

    public function getUpdatedColumns()
    {
       $stock_diff = $this->getDiffColumns();
       $stock_overview_diff = $this->overview
           ? $this->addPrefixToKeys($this->overview->getDiffColumns(),'overview')
           : [];
       $stock_company_profile_diff = $this->companyProfile
           ? $this->addPrefixToKeys($this->companyProfile->getDiffColumns(),'companyProfile')
           : [];

       $stock_news = $this->news->last();
       $stock_news_diff =  $stock_news
           ? $this->addPrefixToKeys($stock_news->getDiffColumns(),'news')
           : [];

       $corporateActions = $this->corporateActions->last();

       $stock_corporate_action_diff = $corporateActions
           ? $this->addPrefixToKeys($corporateActions->getDiffColumns(), 'corporateActions')
           : [];

        return array_merge(
            $stock_diff,
            $stock_overview_diff,
            $stock_company_profile_diff,
            $stock_corporate_action_diff,
            $stock_news_diff
        );
    }

    public function getUpdates()
    {
        return $this->historyUpdates()
            ->select('model', \DB::raw("DATE_FORMAT(created_at,'%d-%m-%Y') as date"),
                \DB::raw("DATE_FORMAT(updated_at,'%T') as time"),
                'created_at',
                'updated_at',
                'stock_id',
                'history_id'
            )
            ->orderByDesc('created_at')
            ->get()
            ->groupBy('date');
    }

    public function getStockFromHistory($data)
    {
        $dates = $this->getUpdates();
        $date = $data['date'];

        $dates = $dates->filter( function ($q,$k) use ($date){
            return $date === $k;
        })->toArray();

        $stock = $this->toArray();

        foreach ($dates[$date] as $param) {

            if ($param['model'] == StockOverview::class)
            {
                $stock['overview'] = StockOverviewHistory::find($param['history_id'])->toArray();
            }
            else if ($param['model'] == StockCompanyProfile::class)
            {
                $stock['companyProfile'] = StockCompanyProfileHistory::find($param['history_id'])->toArray();
            }
            else if ($param['model'] == StockNews::class)
            {
                $stock['news'] = StockNewsHistory::find($param['history_id'])->toArray();
            }
            else if ($param['model'] == Stock::class)
            {
                $stock['history'] = $this->history->find($param['history_id'])->toArray();
            }
            else if ($param['model'] == StockCorporateAction::class)
            {
                $stock['corporateActions'][0] = StockCorporateActionHistory::find($param['history_id'])->toArray();
            }
        }

        $stock_options = [
            'overview' => StockOverviewHistory::class,
            'companyProfile' => StockCompanyProfileHistory::class,
            'news' => StockNewsHistory::class,
            'history' => StockOverviewHistory::class,
            'corporateActions' => StockOverviewHistory::class,
        ];

        foreach ($stock_options as $relation => $class)
        {
            if (!isset($stock[$relation]))
            {
                $model = (new $class)->whereStockId($this->id)->get();

                if($model->isNotEmpty()) {
                    $stock[$relation] = $this->casts_array($model->last()->toArray(),(new $class)->getCasts());
                }
                else if($this->$relation !== null) {
                    $stock[$relation] = $this->casts_array($this->$relation->toArray(),(new $class)->getCasts());
                }
            }
        }

        return $stock;

    }

    private function addPrefixToKeys($array, $prefix, $glue = '.')
    {
        $array_result = [];
        foreach ($array as $key => $value) {
            $array_result[$prefix.$glue.$key] = $value;
        }
        return $array_result;
    }
}


