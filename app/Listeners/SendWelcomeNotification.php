<?php

namespace App\Listeners;


use Illuminate\Queue\InteractsWithQueue;
use App\Events\UserRegistered;
use App\Notifications\WelcomeMail; 
use Illuminate\Contracts\Queue\ShouldQueue;

class SendWelcomeNotification implements ShouldQueue
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
    public function handle(UserRegistered $event): void
    {
        $event->user->notify(new WelcomeMail());
    }
}

