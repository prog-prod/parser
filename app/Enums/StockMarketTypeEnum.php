<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

// * @method static self pink()
// * @method static self otcqx()
/**
 * @method static self expertMarket()
 * @method static self pinkNoInformation()
 * @method static self pinkLimited()
 * @method static self pinkCurrent()
 * @method static self otcqb()
 * @method static self otcqxInternational()
 * @method static self otcqxInternationalPremier()
 * @method static self otcqxUS()
 * @method static self otcqxUSPremier()
 */
final class StockMarketTypeEnum extends Enum
{
    public static function labels() : array
    {
        return [
            'expertMarket' => 'Expert Market',
//            'pink' => 'Pink',
            'pinkNoInformation' => 'Pink No Information',
            'pinkLimited' => 'Pink Limited',
            'pinkCurrent' => 'Pink Current',
            'otcqb' => 'OTCQB',
//            'otcqx' => 'OTCQX',
            'otcqxInternational' => 'OTCQX International',
            'otcqxInternationalPremier' => 'OTCQX International Premier',
            'otcqxUS' => 'OTCQX U.S.',
            'otcqxUSPremier' => 'OTCQX U.S. Premier',
        ];
    }

    // TODO : re-check category array
    public function category()
    {
        return match($this->value) {
            'expertMarket' => 40,
//            'pink' => [
//                self::pinkNoInformation()->category,
//                self::pinkLimited()->category,
//                self::pinkCurrent()->category,
//            ],
//            'otcqx' => [
//                self::otcqxInternational()->category,
//                self::otcqxInternationalPremier()->category,
//                self::otcqxUS()->category,
//                self::otcqxUSPremier()->category,
//            ],
            'otcqxInternational' => 6,
            'otcqxInternationalPremier' => 5,
            'otcqxUS' => 2,
            'otcqxUSPremier' => 1,
            'pinkNoInformation' => 22,
            'pinkLimited' => 21,
            'pinkCurrent' => 20,
            'otcqb' => 10,
            default => '',
        };
    }

    public static function getCategoriesIds()
    {
        $categories = [];

        $cases = self::cases();
        foreach ($cases as $case)
        {
            $categories[] = $case->category();
        }

        return implode(',', $categories);
    }
}
