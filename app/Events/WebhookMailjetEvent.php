<?php

namespace App\Events;

use App\Services\MailApis\ApiAbstract;
use Illuminate\Http\Response;


/**
 * Class MailSendEvent
 * @package App\Events
 */
class WebhookMailjetEvent
{
    /**
     * @var Response
     */
    private $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    /**
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }
}
