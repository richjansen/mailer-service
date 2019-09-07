<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Services\SendMailer\SendMailerService;
use Illuminate\Http\Request;

/**
 * Class SendMailController
 * @package App\Http\Controllers
 */
class SendMailController extends Controller
{
    /**
     * @param Request $request
     * @param SendMailerService $sendMailerService
     * @return string
     */
    public function __invoke(Request $request, SendMailerService $sendMailerService)
    {
        $config     = config('sendmailer.apis');
        $mailApi    = $config['mailjet']['client']::create($config['mailjet']);

        SendEmailJob
            ::dispatch($mailApi)
            ->delay(now()->addSeconds(10));

        return response()->json(
            ['success' => true]
        );
    }
}
