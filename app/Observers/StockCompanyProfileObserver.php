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
use App\Models\StockCorporateAction;

class StockCompanyProfileObserver
{
    /**
     * Handle the Stock "created" event.
     *
     * @param StockCompanyProfile $stock
     * @return void
     */

    public function updating(StockCompanyProfile $stock)
    {
        // create history row of stock
        $diff = $stock->makeHidden('id', 'updated_at', 'created_at');

        $originalDiff = $diff->getRawOriginal();
        unset($originalDiff['id']);
        unset($originalDiff['updated_at']);
        unset($originalDiff['created_at']);

        $originalDiff = new StockCompanyProfile($originalDiff);

        // if original data and current data is different - creating history row
        if ($originalDiff->toJson() !== $diff->toJson()) {
            // add current stock data to history
            $originalDiff->stocks_history_id = $stock->stock_id;
            $history = $stock->history()->create($originalDiff->toArray());

            event( new HistoryUpdateEvent(StockCompanyProfile::class, $stock->stock_id, $history->id));
        }
//        NotifyUsersAboutUpdatedStockJob::dispatchNow($stock);
    }

}
