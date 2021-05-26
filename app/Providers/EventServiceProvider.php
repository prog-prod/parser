<?php

namespace App\Providers;

use App\Models\Stock;
use App\Models\StockOverview;
use App\Models\User;
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
    }
}
