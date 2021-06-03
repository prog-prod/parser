<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockCorporateActionHistory extends Model
{
    use HasFactory;

    protected $table = 'stock_corporate_action_histories';
    public $timestamps = true;

    protected $fillable = [
        'stock_id', 'changeDate', 'comments', 'actionType'
    ];
}
