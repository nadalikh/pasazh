<?php

namespace App\Listeners;

use App\Events\ProductSMSEvent;
use App\mySweetServices\services\mySweetSMS;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendProductSMS
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
     * @param  \App\Events\ProductSMSEvent  $event
     * @return void
     */
    public function handle(ProductSMSEvent $event)
    {
        $user = auth()->user();
        $sms = new mySweetSMS($user->mobile, " product is created");
        $sms->sendSMS();
    }
}
