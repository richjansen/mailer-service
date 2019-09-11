<?php

namespace App\Http\Controllers;

use App\Events\WebhookMailjetEvent;
use App\Jobs\SendEmailJob;
use App\Services\SendMailer\SendMailerService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class SendMailController
 * @package App\Http\Controllers
 */
class MailjetController extends Controller
{
    /**
     * @param Request $request
     * @param SendMailerService $sendMailerService
     * @return string
     */
    public function __invoke(Response $response, SendMailerService $sendMailerService)
    {
        event(new WebhookMailjetEvent($response));
    }
}
