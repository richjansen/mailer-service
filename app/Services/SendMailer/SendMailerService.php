<?php

namespace App\Services\SendMailer;

use App\Contracts\ClientResponseInterface;
use App\Events\MailSendEvent;
use App\Exceptions\ServiceOfflineException;
use App\Repositories\MailRepository;
use App\Repositories\RecipientRepository;
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
     * @var MailRepository
     */
    private $mailRepository;

    /**
     * @var RecipientRepository
     */
    private $recipientRepository;

    /**
     * SendMailerService constructor.
     * @param MailRepository $mailRepository
     * @param RecipientRepository $recipientRepository
     */
    public function __construct(MailRepository $mailRepository, RecipientRepository $recipientRepository)
    {
        $this->mailRepository = $mailRepository;
        $this->recipientRepository = $recipientRepository;
    }

    /**
     * @param int|null $clientIndex
     * @return mixed
     */
    public function sendTestMail(int $clientIndex = 0)
    {
        $body = view('emails.test', ['name' => "Testje"])->toHtml();

        try {
            $mailClient = $this->getMailClient($clientIndex);
            $subject    = $this->mailSettings['subject'] . " SendGrid and a repos";
            $recipient  = $this->recipientRepository->findOrCreate(env('TEST_EMAIL'), "Example User");
            $this->recipientRepository->save($recipient);

            $mail       = $this->mailRepository->create($body, $subject, $recipient);
            $response   = $mailClient->send($mail);
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
     * @param ClientResponseInterface $mailClient
     * @return $this
     */
    public function addClient(ClientResponseInterface $mailClient): SendMailerService
    {
        $mailClient->setMailSettings($this->mailSettings);

        // @todo Make sure there are no duplicate apis
        $this->mailClients[] = $mailClient;

        return $this;
    }
}
