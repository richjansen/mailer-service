<?php

namespace App\Listeners;

use App\Events\MailSendEvent;

/**
 * Class LogMailResponseListener
 * @package App\Listeners
 */
class LogMailResponseListener
{
    /**
     * @param MailSendEvent $event
     */
    public function handle(MailSendEvent $event)
    {
//        dd($event->getResponse());

        echo("convert Sendgrid and Mailjet responses to a generic class for the listener");
    }
}
