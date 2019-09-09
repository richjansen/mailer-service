<?php

namespace App\Services\SendMailer;

use App\Traits\MailSettingsTrait;

class HandleResponseService
{
    use MailSettingsTrait;

    public function handleResponse($response)
    {
        dd($response);
    }
}
