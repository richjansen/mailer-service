<?php

namespace App\Events;

use App\Contracts\MailClientResponseAwareInterface;
use App\Services\MailApis\ApiAbstract;
use Mailjet\Response;

/**
 * Class MailSendEvent
 * @package App\Events
 */
class MailSendEvent implements MailClientResponseAwareInterface
{
    /**
     * @var Response
     */
    private $response;

    /**
     * @var ApiAbstract
     */
    private $mailApi;

    /**
     * MailSendEvent constructor.
     * @param $response mailjet or sendgrid response
     * @param ApiAbstract $mailApi
     */
    public function __construct($response, ApiAbstract $mailApi)
    {
        $this->response = $response;
        $this->mailApi  = $mailApi;
    }

    /**
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @return ApiAbstract
     */
    public function getMailApi(): ApiAbstract
    {
        return $this->mailApi;
    }
}
