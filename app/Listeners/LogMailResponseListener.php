<?php

namespace App\Listeners;

use App\Contracts\MailClientResponseAwareInterface;
use App\Services\SendMailer\HandleResponseService;

/**
 * Class LogMailResponseListener
 * @package App\Listeners
 */
class LogMailResponseListener
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
     * @param MailClientResponseAwareInterface $event
     */
    public function handle(MailClientResponseAwareInterface $event)
    {
        $this->handleResponseService->handleResponse($event);
    }
}
