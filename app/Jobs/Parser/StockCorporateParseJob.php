<?php

namespace App\Jobs\Parser;

use App\Models\Stock;
use App\Models\User;
use App\Notifications\ErrorParseNotification;
use App\Notifications\StockUpdated;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Notification;
use NotificationChannels\Telegram\TelegramMessage;

class StockCorporateParseJob implements ShouldQueue
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
        $response = Http::get('https://backend.otcmarkets.com/otcapi/company/corp-actions',[
            'type' => 'Symbol Change',
            'pageSize' => 20,
            'symbol' => $this->stock->symbol,
            'retainPageSize' => true
        ])->json();

        if (is_array($response['records']) && count($response['records']) > 0)
        {
            foreach ($response['records'] as $record)
            {
                try {
                    $this->stock->corporateActions()->updateOrCreate(['changeDate' => $record['changeDate']], $record);
                }
                catch (\Exception $e) {
                    $message = "**ERROR Parse (StockCorporateParseJob) | Symbol: " . $this->stock->symbol;
                    Notification::send([User::first()], new ErrorParseNotification($message, $e->getMessage()));
                }
            }
        }

        StockCorporateParseJob::dispatch($this->stock)->delay(now()->addHours(rand(6, 12)));
    }
}
