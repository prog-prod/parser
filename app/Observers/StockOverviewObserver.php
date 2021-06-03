<?php

namespace App\Observers;

use App\Jobs\NotifyUsersAboutUpdatedStockJob;
use App\Models\StockOverview;

class StockOverviewObserver
{
    /**
     * Handle the StockOverview "created" event.
     *
     * @param  \App\Models\StockOverview  $stockOverview
     * @return void
     */
    public function created(StockOverview $stockOverview)
    {
        //
    }

    /**
     * Handle the StockOverview "updated" event.
     *
     * @param  \App\Models\StockOverview  $stockOverview
     * @return void
     */
    public function updating(StockOverview $stockOverview)
    {
        // create history row of stock overview
        $diff = $stockOverview->makeHidden('id', 'updated_at', 'created_at');

        $originalDiff = $diff->getRawOriginal();
        $originalDiff['stock_overview_id'] = $originalDiff['id'];
        unset($originalDiff['id']);
        unset($originalDiff['updated_at']);
        unset($originalDiff['created_at']);

        // if original data and current data is different - creating history row and notifications
        if (array_diff($originalDiff, $diff->toArray()))
        {
            $stockOverview->history()->create(
                $originalDiff
            );

            // make notifications in telegram about stock overview changes (a lot of data in this table)
            NotifyUsersAboutUpdatedStockJob::dispatchNow($stockOverview);
        }
    }
}
