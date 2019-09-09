<?php

namespace App\Listeners;

use App\Contracts\ApiResponseAwareInterface;
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
     * @param ApiResponseAwareInterface $event
     */
    public function handle(ApiResponseAwareInterface $event)
    {
        $this->handleResponseService->handleResponse($event);
    }
}
