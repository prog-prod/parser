<?php

namespace App\Jobs\Parser;

use App\Enums\StockMarketTypeEnum;
use App\Models\Stock;
use App\Models\User;
use App\Notifications\ErrorParseNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Notification;
use NotificationChannels\Telegram\TelegramMessage;

class StockParseJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $response = json_decode(Http::get('https://www.otcmarkets.com/research/stock-screener/api', [
            'pageSize' => 15000,
            'market' => StockMarketTypeEnum::getCategoriesIds()
        ])->json(), true);

        if ($response && isset($response['stocks']))
        {
            foreach ($response['stocks'] as $stock)
            {
                try {
                    Stock::updateOrCreate(['symbol' => $stock['symbol']], $stock);
                }
                catch (\Exception $e) {
                    $message = "**ERROR Parse (StockParseJob) | Symbol: " . $stock['symbol'];
                    Notification::send([User::first()], new ErrorParseNotification($message, $e->getMessage()));
                }
            }
        }
    }
}
