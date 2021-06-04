<?php

namespace App\Observers;

use App\Events\HistoryUpdateEvent;
use App\Models\Stock;
use App\Models\StockCorporateAction;

class StockCorporateActionObserver
{

    /**
     * Handle the Stock "created" event.
     *
     * @param StockCorporateAction $stock
     * @return void
     */

    public function updating(StockCorporateAction $stock)
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
            event( new HistoryUpdateEvent(StockCorporateAction::class, $stock->stock_id, $history->id));

        }
//        NotifyUsersAboutUpdatedStockJob::dispatchNow($stock);
    }

}
