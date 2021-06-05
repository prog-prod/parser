<?php

namespace App\Jobs\Parser;

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

class StockOverviewParseJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Stock $stock;

    /**
     * Create a new job instance.
     *
     * @param Stock $stock
     *
     * @return void
     */
    public function __construct(Stock $stock)
    {
        $this->stock = $stock;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $response = Http::get('https://backend.otcmarkets.com/otcapi/stock/trade/inside/' . $this->stock->symbol, [
            'symbol' => $this->stock->symbol
        ])->json();

        $response['symbol'] = $this->stock->symbol;

        try {
            $this->stock->overview()->updateOrCreate(['symbol' => $response['symbol']], $response);
        }
        catch (\Exception $e) {
            $message = "**ERROR Parse (StockOverviewParseJob) | Symbol: " . $response['symbol'];
            Notification::send([User::first()], new ErrorParseNotification($message, $e->getMessage()));
        }

        StockOverviewParseJob::dispatch($this->stock)->delay(now()->addHours(rand(3,10)));
    }
}
