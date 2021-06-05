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

class StockNewsParseJob implements ShouldQueue
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
        $response = Http::get('https://backend.otcmarkets.com/otcapi/company/' . $this->stock->symbol . '/dns/news', [
            'symbol' => $this->stock->symbol
        ])->json();

        if ($response['records'] ?? false)
        {
            foreach ($response['records'] as $record) {

                $record['original_id'] = $record['id'];
                unset($record['id']);

                $news = $this->stock->news()->updateOrCreate(['original_id' => $record['original_id']], $record);

                $newsDetail = Http::get('https://backend.otcmarkets.com/otcapi/company/dns/news/content/' . $news->original_id, [
                    'newsId' => $news->original_id
                ]);

                if ($content = trim($newsDetail->body()))
                {
                    try {
                        $this->stock->news()->whereOriginalId($news->original_id)->update(['content' => $content]);
                    }
                    catch (\Exception $e) {
                        $message = "**ERROR Parse (StockNewsParseJob)**";
                        Notification::send([User::first()], new ErrorParseNotification($message, $e->getMessage()));
                    }
                }

                sleep(2.5);
            }
        }

        StockNewsParseJob::dispatch($this->stock)->delay(now()->addHours(rand(8, 14)));
    }
}
