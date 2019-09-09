<?php

namespace App\Services\SendMailer;

use App\Contracts\ApiResponseAwareInterface;
use App\Traits\MailSettingsTrait;

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
}
