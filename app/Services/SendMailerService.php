<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;

/**
 * Class SendMailerService
 * @package App\Services
 */
class SendMailerService
{
    /**
     * SendMailerService constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return bool
     */
    public function sendTestMail(): bool
    {
        Mail
            ::to('richardjansen0408@gmail.com')
            ->send(new TestMail());

        return true;
    }
}
