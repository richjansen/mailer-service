<?php

namespace App\Services\MailApis;

use App\Contracts\ClientResponseInterface;
use App\Contracts\MailModelInterface;
use App\Events\MailHandledEvent;
use App\Exceptions\ServiceOfflineException;
use App\Repositories\MailRepository;
use SendGrid\Mail\Mail as SendGridMail;
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
     * @param MailModelInterface $mailModel
     * @return SendGridMail
     * @throws SendGrid\Mail\TypeException
     */
    private function createMail(MailModelInterface $mailModel)
    {
        $email = new SendGridMail();

//        $email->setFrom($this->mailSettings['from'], $this->mailSettings['name']);
//        $email->setSubject($this->mailSettings['subject'] . " SendGrid");
//        $email->addTo(env('TEST_EMAIL'), "Example User");
//        $email->addContent($this->mailSettings['content-type'], $htmlBody);

        $email->setFrom($this->mailSettings['from'], $this->mailSettings['name']);
        $email->setSubject($mailModel->getSubject());
        $email->addTo(env('TEST_EMAIL'), "Example User");
        $email->addContent($this->mailSettings['content-type'], $mailModel->getBody());

        return $email;
    }

    /**
     * @see https://app.sendgrid.com/guide/integrate/langs/php
     * @param MailModelInterface $mailModel
     * @return SendGrid\Response
     * @throws SendGrid\Mail\TypeException
     * @throws ServiceOfflineException
     */
    public function send(MailModelInterface $mailModel)
    {
        // test
//        throw new ServiceOfflineException(new Exception('offline'));

        $sendGridEmail = $this->createMail($mailModel);

        try {
            $serviceResponse = $this->mailerService->send($sendGridEmail);
            // @todo remove the resolve() call. Use injection or setter
            event(new MailHandledEvent($mailModel, resolve(MailRepository::class)));
            return $serviceResponse;
        } catch (Exception $e) {
            throw new ServiceOfflineException($e);
        }
    }

    /**
     * The SendMailer had send an email away. Now log that
     * @param $response
     */
    public function handleClientResponse($response)
    {
        if (202 === $response->statusCode()) {

        }
        dd("SendGrid handle response");
    }
}
