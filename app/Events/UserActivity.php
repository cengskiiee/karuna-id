<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserActivity
{
    use Dispatchable, SerializesModels;

    public $timestamp;

    public function __construct()
    {
        $this->timestamp = now();
    }
}
