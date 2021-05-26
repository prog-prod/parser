<?php

namespace App\Jobs;

use App\Enums\StockUpdatedTypeEnum;
use App\Models\StockOverview;
use App\Models\User;
use App\Notifications\StockUpdated;
use App\Observers\StockOverviewObserver;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

/**
 * Class NotifyUsersAboutUpdatedStockJob
 *
 * Including in StockOverviewObserver
 * @see StockOverviewObserver
 *
 * @package App\Jobs
 */
class NotifyUsersAboutUpdatedStockJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private StockOverview $stockOverview;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(StockOverview $stockOverview)
    {
        $this->stockOverview = $stockOverview;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $notifyUsers = User::whereHas('stockFilter', function($query) {
            return $query->where('min_price', '<=', (float) $this->stockOverview->lastSale)
                ->where('max_price', '>=', (float) $this->stockOverview->lastSale);
        })->get();

        if ($notifyUsers)
        {
            $notificationMessage = 'Stock *#' . $this->stockOverview->stock_id . "*\nSymbol: *" . $this->stockOverview->symbol . "*\n\n";

            /** last stock price */
            if (($oldData = $this->stockOverview->getOriginal('lastSale')) !== ($newData = $this->stockOverview->lastSale))
            {
                $notificationMessage .= '*' . StockUpdatedTypeEnum::lastPriceChanged()->label . '*';
                $notificationMessage .= "\nStock Price Type: " . $this->stockOverview->tickName;
                $notificationMessage .= $this->formatMessage('Previous Price', '$' . (float) $oldData, 'Current Price', '$' . (float) $newData);
            }

            /** Maximum price per day */
            if (($oldData = $this->stockOverview->getOriginal('dailyHigh')) !== ($newData = $this->stockOverview->dailyHigh))
            {
                $notificationMessage .= '*' . StockUpdatedTypeEnum::dailyHighChanged()->label . '*';
                $notificationMessage .= $this->formatMessage('Previous Price', '$' . (float) $oldData, 'Current Price', '$' . (float) $newData);
            }

            /** Maximum price per day */
            if (($oldData = $this->stockOverview->getOriginal('dailyHigh')) !== ($newData = $this->stockOverview->dailyHigh))
            {
                $notificationMessage .= '*' . StockUpdatedTypeEnum::dailyHighChanged()->label . '*';
                $notificationMessage .= $this->formatMessage('Previous Price', '$' . (float) $oldData, 'Current Price', '$' . (float) $newData);
            }


            /** Minimum price per day */
            if (($oldData = $this->stockOverview->getOriginal('dailyLow')) !== ($newData = $this->stockOverview->dailyLow))
            {
                $notificationMessage .= '*' . StockUpdatedTypeEnum::dailyLowChanged()->label . '*';
                $notificationMessage .= $this->formatMessage('Previous Price', '$' . (float) $oldData, 'Current Price', '$' . (float) $newData);
            }

            /** Price changed */
            if (($this->stockOverview->getOriginal('change')) !== ($newData = $this->stockOverview->change))
            {
                $notificationMessage .= '*' . StockUpdatedTypeEnum::priceChanged()->label . '*';
                $notificationMessage .= $this->formatMessage('Price changed', '$' . (float) $newData, 'Percentage change in price', (float) $this->stockOverview->percentChange . '%');
            }

            /**
             * Generate alert when Volume is “4 times” higher than Average Vol.
             *
             * TODO: add settings for dynamic "4 times"
             */
            if ($this->stockOverview->volume > ($this->stockOverview->thirtyDaysAvgVol * 4))
            {
                $notificationMessage .= '*' . StockUpdatedTypeEnum::volumeHigherThanAverageVol()->label . '*';
                $notificationMessage .= $this->formatMessage('Current Volume', $this->stockOverview->volume, 'AVERAGE VOL (30D)', $this->stockOverview->thirtyDaysAvgVol);
            }

            Notification::send($notifyUsers, new StockUpdated($this->stockOverview, $notificationMessage));
        }
    }

    /**
     * just message formatter
     *
     * @param $firstLabel
     * @param $firstValue
     * @param $secondLabel
     * @param $secondValue
     * @return string
     */
    private function formatMessage($firstLabel, $firstValue, $secondLabel, $secondValue)
    {
        return "\n$firstLabel: *$firstValue*\n$secondLabel: *$secondValue*\n\n";
    }
}
