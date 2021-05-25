<?php

namespace App\Services;

use App\Enums\VerificationTypeEnum;
use App\Models\UserVerification;
use App\Traits\CodeTrait;

class VerificationService
{
    use CodeTrait;

    public function generateCode() : string
    {
        $code = $this->getCode(new UserVerification());

        user()->verifications()->updateOrCreate(['type' => VerificationTypeEnum::telegram()->value], [
            'code' => $code
        ]);

        return $code;
    }
}
