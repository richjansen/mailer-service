<?php

namespace App\Providers;

use App\Events\{MailHandledEvent, MailSendEvent};
use App\Events\WebhookMailjetEvent;
use App\Listeners\{LogMailResponseListener, SaveMailListener};
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        MailSendEvent::class => [
            LogMailResponseListener::class,
        ],
        MailHandledEvent::class => [
            SaveMailListener::class,
        ],
//        WebhookMailjetEvent::class => [
//
//        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
