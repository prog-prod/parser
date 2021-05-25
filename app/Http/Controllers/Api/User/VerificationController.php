<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Services\TelegramService;
use App\Services\VerificationService;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    private $verificationService;
    private $telegramService;

    public function __construct(VerificationService $verificationService, TelegramService $telegramService)
    {
        $this->verificationService = $verificationService;
        $this->telegramService = $telegramService;
    }

    public function telegram()
    {
        return response()->json([
            'result' => true,
            'code' => $this->verificationService->generateCode(),
            'botUrl' => $this->telegramService->getBotUrl()
        ], 200);
    }
}
