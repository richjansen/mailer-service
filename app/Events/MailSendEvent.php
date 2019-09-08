<?php

namespace App\Events;

use Mailjet\Response;

/**
 * Class MailSendEvent
 * @package App\Events
 */
class MailSendEvent
{
    /**
     * @var Response
     */
    private $response;

    /**
     * MailSendEvent constructor.
     * @param Response $response
     */
    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    /**
     * @return Response
     */
    public function getResponse(): Response
    {
        return $this->response;
    }
}
