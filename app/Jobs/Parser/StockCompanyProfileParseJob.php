<?php

namespace App\Jobs\Parser;

use App\Models\Stock;
use App\Models\StockCompanyProfile;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class StockCompanyProfileParseJob implements ShouldQueue
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
        $response = Http::get('https://backend.otcmarkets.com/otcapi/company/profile/full/' . $this->stock->symbol, [
            'symbol' => $this->stock->symbol
        ])->json();

        if ($response)
        {
            unset($response['id']);

            $companyProfile = $this->stock->companyProfile()->firstOrCreate([
                'symbol' => $this->stock->symbol,
                'stock_id' => $this->stock->id
            ]);

            if (isset($response['tierStartDate']) && $response['tierStartDate'] < 0) {
                $response['tierStartDate'] = 0;
            }

            $companyProfile->fill($response);
            $companyProfile->save();
        }

        StockCompanyProfileParseJob::dispatch($this->stock)->delay(now()->addHours(rand(3,7)));
    }
}
