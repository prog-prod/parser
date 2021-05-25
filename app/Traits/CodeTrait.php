<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait CodeTrait
{
    public function getCode(Model $model, $length = 7)
    {
        $correctCode = false;
        $keys = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        do {
            $input_length = strlen($keys);
            $code = '';

            for ($i = 0; $i < $length; $i++) {
                $random_character = $keys[mt_rand(0, $input_length - 1)];
                $code .= $random_character;
            }

            if (! $model->where('code', $code)->first()) {
                $correctCode = true;
            }
        } while ($correctCode === false);

        return $code;
    }
}
