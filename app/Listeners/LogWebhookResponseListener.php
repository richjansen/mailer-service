<?php

namespace App\Listeners;

use App\Events\WebhookMailjetEvent;
use App\Services\SendMailer\HandleResponseService;

/**
 * Class LogMailResponseListener
 * @package App\Listeners
 */
class LogWebhookResponseListener
{
    /**
     * @var HandleResponseService
     */
    private $handleResponseService;

    /**
     * LogMailResponseListener constructor.
     * @param HandleResponseService $handleResponseService
     */
    public function __construct(HandleResponseService $handleResponseService)
    {
        $this->handleResponseService = $handleResponseService;
    }

    /**
     * @param WebhookMailjetEvent $event
     */
    public function handle(WebhookMailjetEvent $event)
    {
        $this->handleResponseService->handleWebhookRequest($event);
    }
}
