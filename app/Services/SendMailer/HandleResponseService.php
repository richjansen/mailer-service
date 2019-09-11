<?php

namespace App\Services\SendMailer;

use App\Contracts\ApiResponseAwareInterface;
use App\Traits\MailSettingsTrait;
use Illuminate\Http\Response;

/**
 * Class HandleResponseService
 * @package App\Services\SendMailer
 */
class HandleResponseService
{
    use MailSettingsTrait;

    /**
     * @param ApiResponseAwareInterface $apiResponse
     */
    public function handleResponse(ApiResponseAwareInterface $apiResponse)
    {
        $apiResponse->getMailApi()->handleResponse($apiResponse->getResponse());
    }

    public function handleWebhookResponse(Response $httpResponse)
    {

    }
}
