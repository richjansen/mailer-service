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
    public function sendTestMail(MailApiInterface $mailApi)
    {
        $body = view('emails.test', ['name' => "Testje"])->toHtml();

        return $mailApi->send($body);
    }
}
