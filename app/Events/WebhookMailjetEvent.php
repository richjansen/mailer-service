<?php

namespace App\Events;

use Illuminate\Http\Request;

/**
 * Class MailSendEvent
 * @package App\Events
 */
class WebhookMailjetEvent
{
    /**
     * @var Request
     */
    private $request;

    /**
     * WebhookMailjetEvent constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }
}
