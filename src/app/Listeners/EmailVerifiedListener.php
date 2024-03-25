<?php

namespace App\Listeners;

use App\Mail\EmailVerifiedMail;
use Illuminate\Auth\Events\Verified;
use Mail;

class EmailVerifiedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Verified $event): void
    {
        Mail::to($event->user->email)->send(new EmailVerifiedMail());
    }
}
