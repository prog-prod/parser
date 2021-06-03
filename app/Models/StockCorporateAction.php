<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockCorporateAction extends Model
{
    use HasFactory;

    protected $table = 'stock_corporate_actions';

    protected $fillable = [
        'stock_id', 'changeDate', 'comments', 'actionType'
    ];

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
    public function history()
    {
        return $this->hasMany(StockCorporateActionHistory::class,'stock_corporate_action_id','id');
    }
    public function getDiffColumns(){
        $current = $this->toArray();
        unset($current['id'],$current['created_at'],$current['updated_at']);
        $history = $this->history->last()
            ?  $this->history->last()->toArray()
            : [];

        if(!$history) return [];

        return array_diff($current, $history);
    }
}
