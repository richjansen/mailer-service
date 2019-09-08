<?php

namespace App\Services\SendMailer;

use App\Contracts\MailApiInterface;
use App\Events\MailSendEvent;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

/**
 * Class SendMailerService
 * @package App\Services
 */
class SendMailerService
{

    /**
     * @param MailApiInterface $mailApi
     */
    public function sendTestMail(MailApiInterface $mailApi)
    {
        $body = view('emails.test', ['name' => "Testje"])->toHtml();

        $response = $mailApi->send($body);

        event(new MailSendEvent($response));
    }
}
