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
    public function __invoke(SendMailerService $sendMailerService, ?string $service = null)
    {
        if ($service) {
            $config     = config('sendmailer.apis')[$service];
            $mailApi    = resolve($config['client']);
        } else {
            $mailApi = null;
        }

        //        SendEmailJob
//            ::dispatch($mailApi)
//            ->delay(now()->addSeconds(10))
//        ;
        $sendMailerService->sendTestMail($mailApi);

        return response()->json(
            ['success' => true]
        );
    }
}
