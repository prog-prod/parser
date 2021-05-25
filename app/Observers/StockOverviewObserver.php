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
        NotifyUsersAboutUpdatedStockJob::dispatchNow($stockOverview);
    }
}
