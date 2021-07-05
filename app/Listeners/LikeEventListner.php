<?php

namespace App\Listeners;

use App\Events\LikeEvent ;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LikeEventListner
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
     * @param  LikeEvent   $event
     * @return void
     */
    public function handle(LikeEvent  $event)
    {
        //
    }
}
