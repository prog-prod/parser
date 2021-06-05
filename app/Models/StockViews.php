<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockViews extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'stock_id',
    ];

    public function stock(){
        return $this->hasOne(Stock::class);
    }
}
