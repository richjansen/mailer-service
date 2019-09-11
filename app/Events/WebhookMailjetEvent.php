<?php

namespace App\Events;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
