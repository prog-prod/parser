<?php

namespace App\Models;

use App\Casts\HistoryUpdateCast;
use App\Traits\BaseTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryUpdate extends Model
{
    use HasFactory;
    use BaseTrait;

    public $timestamps = true;

    protected $fillable = [
      'stock_id',
      'history_id',
      'model'
    ];

    protected $casts = [
        'model' => HistoryUpdateCast::class
    ];


    public static function getLastUpdates($stock_id) {
        return HistoryUpdate::where('created_at','>=',\DB::raw('CURDATE()'))
            ->whereStockId($stock_id)->get();
    }
    public function stock(){
        return $this->belongsTo(\App\Models\Stock::class);
    }


}
