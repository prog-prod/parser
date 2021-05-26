<?php

namespace App\Jobs\Parser;

use App\Enums\StockMarketTypeEnum;
use App\Models\Stock;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

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

        info('stocks: ' . count($response['stocks']));

        if ($response && isset($response['stocks']))
        {
            foreach ($response['stocks'] as $stock)
            {
                Stock::updateOrCreate(['symbol' => $stock['symbol']], $stock);
            }

            info(Stock::count());
        }
    }
}
