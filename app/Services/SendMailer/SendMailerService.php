<?php

namespace App\Services\SendMailer;

use App\Contracts\MailApiInterface;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

/**
 * Class SendMailerService
 * @package App\Services
 */
class SendMailerService
{

    /**
     * @return bool
     */
    public function sendTestMail(MailApiInterface $mailApi): void
    {
        $body = view('emails.test', ['name' => "Testje"])->toHtml();

        $mailApi->send($body);

//        var_dump($mailResponse->getData());exit;
//        Mail
//            ::to('richardjansen0408@gmail.com')
//            ->send(new TestMail());

//        return true;
    }
}
