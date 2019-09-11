<?php

namespace App\Http\Controllers;

use App\Events\WebhookMailjetEvent;
use Illuminate\Http\Request;
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
    public function __invoke(Request $request)
    {
        event(new WebhookMailjetEvent($request));
    }
}
