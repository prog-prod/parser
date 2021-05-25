<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self verifiedProfileDataUpdated()
 * @method static self changedStopSign()
 * @method static self changedYieldSign()
 * @method static self deletedStopSign()
 * @method static self deletedYieldSign()
 * @method static self newStockNews()
 * @method static self stockStatusChanged()
 * @method static self lastPriceChanged()
 * @method static self dailyHighChanged()
 * @method static self dailyLowChanged()
 * @method static self priceChanged()
 */
final class StockUpdatedTypeEnum extends Enum
{
    public static function labels() : array
    {
        return [
            'verifiedProfileDataUpdated' => 'Verified Profile data was updated.',
            'changedStopSign' => 'Stop sign was changed.',
            'changedYieldSign' => 'Yield sign was changed.',
            'deletedStopSign' =>  'Stop sign was deleted.',
            'deletedYieldSign' => 'Yield sign was deleted.',
            'deletedSomeSign' => 'Some sign was deleted.',
            'newStockNews' => 'Some news was added.',
            'stockStatusChanged' => 'Status was changed.',
            'lastPriceChanged' => 'Last Price was changed.',
            'dailyHighChanged' => 'Maximum price per day.',
            'dailyLowChanged' => 'Minimum price per day.',
            'priceChanged' => 'Price was changed.'
        ];
    }
}
