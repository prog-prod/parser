<?php

namespace App\Jobs\Parser;

use App\Models\Stock;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

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

        $this->stock->overview()->updateOrCreate(['symbol' => $response['symbol']], $response);

        StockOverviewParseJob::dispatch($this->stock)->delay(now()->addHours(rand(3,10)));
    }
}
