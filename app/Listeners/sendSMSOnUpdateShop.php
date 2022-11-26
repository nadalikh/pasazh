<?php

namespace App\Listeners;

use App\Events\updateShopEvent;
use App\mySweetServices\services\mySweetSMS;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class sendSMSOnUpdateShop
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
     * @param  \App\Events\updateShopEvent  $event
     * @return void
     */
    public function handle(updateShopEvent $event)
    {
        $user = auth()->user();
        $sms = new mySweetSMS($user->mobile, " shop is updated");
        $sms->sendSMS();

    }
}
