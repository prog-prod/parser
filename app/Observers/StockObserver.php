<?php

namespace App\Observers;

use App\Events\HistoryUpdateEvent;
use App\Jobs\Parser\StockCompanyProfileParseJob;
use App\Jobs\Parser\StockCorporateParseJob;
use App\Jobs\Parser\StockNewsParseJob;
use App\Jobs\Parser\StockOverviewParseJob;
use App\Models\HistoryUpdate;
use App\Models\Stock;
use App\Models\UpdatedStocks;

class StockObserver
{
    /**
     * Handle the Stock "created" event.
     *
     * @param Stock $stock
     * @return void
     */
    public function created(Stock $stock)
    {
        // random from 1 to 10 minutes
        StockOverviewParseJob::dispatch($stock)->delay(now()->addMinutes(rand(1,120)));

        // parse stock news
        StockNewsParseJob::dispatch($stock)->delay(now()->addMinutes(rand(240, 360)));

        // parse stock corporate info
        StockCorporateParseJob::dispatch($stock)->delay(now()->addMinutes(rand(1,120)));

        // parse stock company profile info
        StockCompanyProfileParseJob::dispatch($stock)->delay(now()->addMinutes(rand(1,120)));
    }

    public function updating(Stock $stock)
    {
        // create history row of stock
        $diff = $stock->makeHidden('id', 'updated_at', 'created_at');

        $originalDiff = $diff->getRawOriginal();
        unset($originalDiff['id']);
        unset($originalDiff['updated_at']);
        unset($originalDiff['created_at']);

        $originalDiff = new Stock($originalDiff);

        // if original data and current data is different - creating history row
        if ($originalDiff->toJson() !== $diff->toJson())
        {
            // add current stock data to history
            $history = $stock->history()->create(
                $originalDiff->toArray()
            );

            event(new HistoryUpdateEvent(Stock::class, $stock->id, $history->id));
        }
    }
}
