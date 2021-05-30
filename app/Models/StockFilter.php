<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockFilter extends Model
{
    use HasFactory;

    protected $table = 'stock_filters';

    protected $fillable = ['min_price', 'max_price', 'categories'];

    protected $casts = [
        'min_price' => 'float',
        'max_price' => 'float',
        'categories' => 'array'
    ];

    public function getPricesRange($min_price = null, $max_price = null){
        return [
            !is_null($min_price) ? (float)$min_price : $this->min_price,
            !is_null($max_price) ? (float)$max_price : $this->max_price,
        ];
    }
}
