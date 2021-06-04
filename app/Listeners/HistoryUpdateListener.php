<?php

namespace App\Listeners;

use App\Models\HistoryUpdate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class HistoryUpdateListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {

        HistoryUpdate::where('created_at','>=',\DB::raw('CURDATE()'))
            ->updateOrcreate([
                'model' => $event->className,
                'stock_id' => $event->stock_id,
            ],[
                'history_id' => $event->history_id,
            ]);


    }
}
