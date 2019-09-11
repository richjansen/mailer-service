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
    public function handleResponse(ApiResponseAwareInterface $apiResponseAware)
    {
        $apiResponseAware
            ->getMailApi()
            ->handleClientResponse($apiResponseAware->getResponse());
    }

    /**
     * @param Response $httpResponse
     */
    public function handleWebhookResponse(Response $httpResponse)
    {
        dd("@todo handle the webhook response of Mailjet");
    }
}
