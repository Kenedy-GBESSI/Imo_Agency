<?php

namespace App\Listeners;

use App\Events\ContactEvent;
use App\Mail\PropertyContactMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class ContactRequestNotification
{


    /**
     * Handle the event.
     */
    public function handle(ContactEvent $contactEvent): void
    {
        Mail::send(new PropertyContactMail($contactEvent->property, $contactEvent->data));
    }
}
