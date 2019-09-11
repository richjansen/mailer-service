<?php

namespace App\Services\SendMailer;

use App\Contracts\MailClientResponseAwareInterface;
use App\Traits\MailSettingsTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class HandleResponseService
 * @package App\Services\SendMailer
 */
class HandleResponseService
{
    use MailSettingsTrait;

    /**
     * @param MailClientResponseAwareInterface $mailClientResponseAware
     */
    public function handleResponse(MailClientResponseAwareInterface $mailClientResponseAware)
    {
        $mailClientResponseAware
            ->getMailApi()
            ->handleClientResponse($mailClientResponseAware->getResponse());
    }

    /**
     * Handle webhook calls from Mailjet
     * @todo    Maybe separate it to MailjetWebhookHandler class
     *          For now it is oke
     * @param Response $httpResponse
     */
    public function handleWebhookRequest(Request $httpRequest)
    {
        dd("@todo handle the webhook request of Mailjet");
    }
}
