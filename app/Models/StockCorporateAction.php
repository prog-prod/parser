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
}
