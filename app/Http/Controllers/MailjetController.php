<?php

namespace App\Http\Controllers;

use App\Events\WebhookMailjetEvent;
use Illuminate\Http\Response;

/**
 * Class SendMailController
 * @package App\Http\Controllers
 */
class MailjetController extends Controller
{
    /**
     * @param Response $response
     */
    public function __invoke(Response $response)
    {
        event(new WebhookMailjetEvent($response));
    }
}
