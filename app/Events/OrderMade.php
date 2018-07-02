<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Events\OrderMade;
class OrderMade
{
    public $order;
    use Dispatchable, InteractsWithSockets, SerializesModels;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        //
        $this->order=$order;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        //return "nkjnbdvd";
         var_dump($event->order.' was Made');
        return new PrivateChannel('channel-name');
    }

    public function handle(OrderMade $order){
       var_dump($event->order.' was Made');
    }
}
