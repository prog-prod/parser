<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockNewsHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        "stock_news_id",
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

}
