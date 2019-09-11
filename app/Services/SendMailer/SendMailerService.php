<?php

namespace App\Services\SendMailer;

use App\Contracts\ClientResponseInterface;
use App\Events\MailSendEvent;
use App\Exceptions\ServiceOfflineException;
use App\Traits\MailApisTrait;
use App\Traits\MailSettingsTrait;

/**
 * Class SendMailerService
 * @package App\Services
 */
class SendMailerService
{
    use MailSettingsTrait;

    /**
     * @var array
     */
    private $mailClients = [];


    /**
     * @param int|null $clientIndex
     * @return mixed
     */
    public function sendTestMail(int $clientIndex = 0)
    {
        $body = view('emails.test', ['name' => "Testje"])->toHtml();

        try {
            $mailClient = $this->getMailClient($clientIndex);
            $response   = $mailClient->send($body);
        } catch (ServiceOfflineException $e) {
            return $this->sendTestMail(++$clientIndex);
        }

        event(new MailSendEvent($response, $mailClient));
    }

    /**
     * @param int $key
     * @return mixed
     */
    private function getMailClient(int $key = 0): ClientResponseInterface
    {
        // @todo check for key in array, otherwise throw MailServiceNotFoundException
        return $this->mailClients[$key];
    }

    /**
     * @param ClientResponseInterface $mailApi
     * @return $this
     */
    public function addClient(ClientResponseInterface $mailClient): self
    {
        $mailClient->setMailSettings($this->mailSettings);

        // @todo Make sure there are no duplicate apis
        $this->mailClients[] = $mailClient;

        return $this;
    }
}
