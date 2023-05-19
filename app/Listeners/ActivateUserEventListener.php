<?php

namespace App\Listeners;
use App\Events\activateUserEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ActivateUserEventListener
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
    public function handle(activateUserEvent $event): void
    {
        $user = $event->user;
        if ($user->is_active == 0) {
            $user->is_active = 1;
            $user->email_verified_at = now();
        }
        $user->save();
    }
}
