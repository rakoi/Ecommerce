<?php

namespace App\Listeners;

use App\Events\OrderMade;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyOrderMade
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
     * @param  OrderMade  $event
     * @return void
     */
    public function handle(OrderMade $event)
    {
        //
    }
}
