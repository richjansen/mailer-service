<?php

namespace App\Events;

use App\Contracts\ApiResponseAwareInterface;
use App\Contracts\MailApiInterface;
use App\Services\MailApis\ApiAbstract;
use Mailjet\Response;

/**
 * Class MailSendEvent
 * @package App\Events
 */
class MailSendEvent implements ApiResponseAwareInterface
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
     * @param $response
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
