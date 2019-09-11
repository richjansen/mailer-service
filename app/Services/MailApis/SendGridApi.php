<?php

namespace App\Services\MailApis;

use App\Contracts\ClientResponseInterface;
use App\Exceptions\ServiceOfflineException;
use SendGrid\Mail\Mail;
use SendGrid;
use Exception;

/**
 * Class SendGridApi
 * @package App\Services\MailApis
 */
class SendGridApi extends ApiAbstract implements ClientResponseInterface
{
    /**
     * SendGridApi constructor.
     * @param SendGrid $sendGrid
     */
    public function __construct(SendGrid $sendGrid)
    {
        $this->mailerService = $sendGrid;
    }

    /**
     * @param $htmlBody
     * @return Mail
     * @throws SendGrid\Mail\TypeException
     */
    protected function createMail($htmlBody)
    {
        $email = new Mail();

        $email->setFrom($this->mailSettings['from'], $this->mailSettings['name']);
        $email->setSubject($this->mailSettings['subject'] . " SendGrid");
        $email->addTo(env('TEST_EMAIL'), "Example User");
        $email->addContent($this->mailSettings['content-type'], $htmlBody);

        return $email;
    }

    /**
     * @see https://app.sendgrid.com/guide/integrate/langs/php
     * @param $htmlBody
     * @return SendGrid\Response
     * @throws SendGrid\Mail\TypeException
     * @throws ServiceOfflineException
     */
    public function send($htmlBody)
    {
        // test
//        throw new ServiceOfflineException(new Exception('offline'));

        $email = $this->createMail($htmlBody);

        try {
            return $this->mailerService->send($email);
        } catch (Exception $e) {
            throw new ServiceOfflineException($e);
        }
    }

    /**
     * @param $response
     */
    public function handleClientResponse($response)
    {
        dd($response);
        dd("SendGrid handle response");
    }
}
