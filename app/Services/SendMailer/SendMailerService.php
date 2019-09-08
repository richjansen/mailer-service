<?php

namespace App\Services\SendMailer;

use App\Contracts\MailApiInterface;
use App\Events\MailSendEvent;
use App\Exceptions\ServiceOfflineException;

/**
 * Class SendMailerService
 * @package App\Services
 */
class SendMailerService
{

    /**
     * @var array
     */
    private $mailApis = [];

    /**
     * @param MailApiInterface|null $mailApi
     * @param int $apiIndex
     * @return mixed
     */
    public function sendTestMail(?MailApiInterface $mailApi = null, int $apiIndex = 0)
    {
        $body = view('emails.test', ['name' => "Testje"])->toHtml();

        try {
            $mailApi = $this->getMailApi($apiIndex);
            $response = $mailApi->send($body);
        } catch (ServiceOfflineException $e) {
            return $this->sendTestMail(null, ++$apiIndex);
        }

        event(new MailSendEvent($response));
    }

    /**
     * @param MailApiInterface $mailApi
     * @return $this
     */
    public function addApi(MailApiInterface $mailApi)
    {
        // @todo Make sure there are no duplicate apis
        $this->mailApis[] = $mailApi;

        return $this;
    }

    /**
     * @param int $key
     * @return mixed
     */
    private function getMailApi(int $key = 0)
    {

        return $this->mailApis[$key];
    }
}
