<?php

namespace App\Observers;

use App\Events\HistoryUpdateEvent;
use App\Jobs\NotifyUsersAboutUpdatedStockJob;
use App\Jobs\Parser\StockCompanyProfileParseJob;
use App\Jobs\Parser\StockCorporateParseJob;
use App\Jobs\Parser\StockNewsParseJob;
use App\Jobs\Parser\StockOverviewParseJob;
use App\Models\Stock;
use App\Models\StockCompanyProfile;
use App\Models\StockNews;

class StockNewsObserver
{


    /**
     * Handle the Stock "created" event.
     *
     * @param StockNews $stock
     * @return void
     */

    public function updating(StockNews $stock)
    {
        // create history row of stock
        $diff = $stock->makeHidden('id', 'updated_at', 'created_at');

        $originalDiff = $diff->getRawOriginal();
        unset($originalDiff['id']);
        unset($originalDiff['updated_at']);
        unset($originalDiff['created_at']);

        // if original data and current data is different - creating history row
        if (array_diff($originalDiff, $diff->toArray())) {
            // add current stock data to history
            $history = $stock->history()->create(
                $stock->makeHidden('id', 'created_at', 'updated_at')->getRawOriginal()
            );
            event( new HistoryUpdateEvent(StockNews::class, $stock->stock_id, $history->id));

        }
//        NotifyUsersAboutUpdatedStockJob::dispatchNow($stock);
    }

}
