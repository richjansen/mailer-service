<?php

namespace App\Http\Controllers;

use App\Services\SendMailerService;
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
        $sendMailerService->sendTestMail();

        return response()->json(
            ['success' => true]
        );
    }
}
