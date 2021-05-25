<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TelegramService
{
    public $telegramSlug;
    public $telegramToken;

    public function __construct()
    {
        $this->telegramSlug = env('TELEGRAM_BOT_SLUG');
        $this->telegramToken = env('TELEGRAM_BOT_TOKEN');
    }

    public function getBotUrl() : string
    {
        return 'https://t.me/' . env('TELEGRAM_BOT_SLUG');
    }

    public function setWebhook() : bool
    {
        $webhookUrl = env('APP_URL') . '/tg/updates';
        $requestUrl = 'https://api.telegram.org/bot' . $this->telegramToken . '/setWebhook';

        $response = Http::get($requestUrl, ['url' => $webhookUrl]);

        return isset($response['description']) && in_array($response['description'], ['Webhook was set', 'Webhook is already set']);
    }

    public function removeWebhook() : bool
    {
        $requestUrl = 'https://api.telegram.org/bot' . $this->telegramToken . '/setWebhook';
        $response = Http::get($requestUrl);

        return isset($response['description']) && in_array($response['description'], ['Webhook was deleted', 'Webhook is already deleted']);
    }
}
