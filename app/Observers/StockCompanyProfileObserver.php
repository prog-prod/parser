<?php

namespace App\Observers;

use App\Jobs\NotifyUsersAboutUpdatedStockJob;
use App\Jobs\Parser\StockCompanyProfileParseJob;
use App\Jobs\Parser\StockCorporateParseJob;
use App\Jobs\Parser\StockNewsParseJob;
use App\Jobs\Parser\StockOverviewParseJob;
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

        // if original data and current data is different - creating history row
        if (array_diff($originalDiff, $diff->toArray())) {
            // add current stock data to history
            $stock->history()->create(
                $stock->makeHidden('id', 'created_at', 'updated_at')->getRawOriginal()
            );
        }
//        NotifyUsersAboutUpdatedStockJob::dispatchNow($stock);
    }

}
