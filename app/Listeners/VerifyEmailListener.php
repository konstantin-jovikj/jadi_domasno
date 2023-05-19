<?php

namespace App\Listeners;

use App\Events\VerifyEmail;
use App\Mail\verifyUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class VerifyEmailListener
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
    public function handle(VerifyEmail $event): void
    {
        $user = $event->user;
        $code = $user->createActivationCode();

        Mail::to($user->email)->send(new verifyUser($user->email, $code));
    }
}
