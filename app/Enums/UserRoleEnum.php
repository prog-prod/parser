<?php

namespace App\Enums;

use Spatie\Enum\Laravel\Enum;

/**
 * Class UserRoleEnum
 *
 * @method static self user()
 * @method static self admin()
 *
 * @package App\Enums
 */
final class UserRoleEnum extends Enum
{
    public static function labels() : array
    {
        return [
            'user' => 'User',
            'admin' => 'Admin'
        ];
    }
}
