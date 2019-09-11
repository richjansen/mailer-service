<?php

namespace App\Http\Controllers;

use App\Events\WebhookMailjetEvent;
use Illuminate\Http\Request;

/**
 * Class SendMailController
 * @package App\Http\Controllers
 */
class MailjetController extends Controller
{
    /**
     * @param Request $request
     */
    public function __invoke(Request $request)
    {
        event(new WebhookMailjetEvent($request));
    }
}
