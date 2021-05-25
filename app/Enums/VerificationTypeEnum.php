<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self telegram()
 * @method static self email()
 */
final class VerificationTypeEnum extends Enum
{
    public static function labels()
    {
        return [
            'telegram' => 'Telegram',
            'email' => 'Email'
        ];
    }
}
