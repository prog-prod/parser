<?php

namespace App\Models;

use App\Traits\StockHistoryTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockNews extends Model
{
    use HasFactory;
    use StockHistoryTrait;

    protected $fillable = [
    	"original_id",
        "stock_id",
        "companyId",
        "userId",
        "title",
        "content",
        "typeId",
        "statusId",
        "location",
        "isImmediate",
        "createdDate",
        "lastModifiedDate",
        "releaseDate",
        "canDistribute",
        "wasDistributed",
        "newsTypeDescript",
        "statusDescript",
        "sourceId",
        "displayDateTime",
        "display",
        "isItemFromExternalProvider",
        "immediate",
        "symbol",
    ];

    public function history()
    {
        return $this->hasMany(StockNewsHistory::class,'stock_news_id','id');
    }
    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
    public function getDiffColumns(){
        $current = $this->toArray();
        unset($current['id'],$current['created_at'],$current['updated_at']);
        $history = $this->history->last()
            ?  $this->history->last()->toArray()
            : [];

        if(!$history) return [];

        $a = $this->casts_array($current);
        $b = $this->casts_array($history);
        $current = $this->to_single_array($a);
        $history = $this->to_single_array($b);

        return array_diff($current, $history);
    }
}
