<?php

namespace App\Listeners;

use App\Events\MailSendEvent;
use App\Services\SendMailer\HandleResponseService;

/**
 * Class LogMailResponseListener
 * @package App\Listeners
 */
class LogMailResponseListener
{
    private $handleResponseService;

    public function __construct(HandleResponseService $handleResponseService)
    {
        $this->handleResponseService = $handleResponseService;
    }

    /**
     * @param MailSendEvent $event
     */
    public function handle(MailSendEvent $event)
    {
        $this->handleResponseService->handleResponse($event->getResponse());

//        echo("convert Sendgrid and Mailjet responses to a generic class for the listener");
    }
}
