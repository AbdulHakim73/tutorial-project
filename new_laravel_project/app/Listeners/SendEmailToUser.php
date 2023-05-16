<?php

namespace App\Listeners;

use App\Events\PageCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendEmailToUser
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
    public function handle(PageCreated $event): void
    {
        Log::alert("post created " . $event->page->title);
    }
}
