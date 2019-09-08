<?php

namespace App\Services\MailApis;

use App\Contracts\MailApiInterface;
use SendGrid\Mail\Mail;
use SendGrid;

/**
 * Class SendGridApi
 * @package App\Services\MailApis
 */
class SendGridApi implements MailApiInterface
{

    /**
     * @var array
     */
    private $mailSettings;

    /**
     * @var SendGrid
     */
    private $mailerService;

    /**
     * SendGridApi constructor.
     * @param array $mailSettings
     * @param SendGrid $sendGrid
     */
    public function __construct(array $mailSettings, SendGrid $sendGrid)
    {
        $this->mailSettings     = $mailSettings;
        $this->mailerService    = $sendGrid;
    }

    /**
     * @param $htmlBody
     * @throws SendGrid\Mail\TypeException
     */
    public function send($htmlBody)
    {
        // https://app.sendgrid.com/guide/integrate/langs/php
        $email = $this->createMail($htmlBody);

        try {
            $response = $this->mailerService->send($email);

            print $response->statusCode() . "\n";
            print_r($response->headers());
            print $response->body() . "\n";
        } catch (Exception $e) {
            echo 'Caught exception: '. $e->getMessage() ."\n";
        }
    }

    /**
     * @param $htmlBody
     * @return Mail
     * @throws SendGrid\Mail\TypeException
     */
    private function createMail($htmlBody)
    {
        $email = new Mail();
        $email->setFrom($this->mailSettings['from']['address'], $this->mailSettings['from']['name']);
        $email->setSubject($this->mailSettings['subject']);
        $email->addTo("richard.chantal@gmail.com", "Example User");
        $email->addContent($this->mailSettings['content-type'], $htmlBody);

        return $email;
    }
}
