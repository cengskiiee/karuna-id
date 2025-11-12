<?php

namespace App\Listeners;

use App\Events\UserActivity;
use Illuminate\Support\Facades\Auth;

class TrackUserActivity
{
    public function handle(UserActivity $event)
    {
        if (Auth::check()) {
            session(['lastActivityTime' => $event->timestamp->timestamp]);
        }
    }
}
