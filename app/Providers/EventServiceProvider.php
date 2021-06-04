<?php

namespace App\Providers;

use App\Events\HistoryUpdateEvent;
use App\Listeners\HistoryUpdateListener;
use App\Models\Stock;
use App\Models\StockCompanyProfile;
use App\Models\StockCorporateAction;
use App\Models\StockNews;
use App\Models\StockOverview;
use App\Models\User;
use App\Observers\StockCompanyProfileObserver;
use App\Observers\StockCorporateActionObserver;
use App\Observers\StockNewsObserver;
use App\Observers\StockObserver;
use App\Observers\StockOverviewObserver;
use App\Observers\UserObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        HistoryUpdateEvent::class => [
            HistoryUpdateListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        StockOverview::observe(StockOverviewObserver::class);
        Stock::observe(StockObserver::class);
        StockCompanyProfile::observe(StockCompanyProfileObserver::class);
        StockCorporateAction::observe(StockCorporateActionObserver::class);
        StockNews::observe(StockNewsObserver::class);
    }
}
