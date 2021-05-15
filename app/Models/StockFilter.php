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
}
