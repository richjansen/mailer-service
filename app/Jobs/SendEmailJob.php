<?php

namespace App\Jobs;

use App\Services\SendMailer\SendMailerService;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $mailApi;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($mailApi)
    {
        $this->mailApi = $mailApi;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(SendMailerService $sendMailerService)
    {
        $sendMailerService->sendTestMail($this->mailApi);
    }
}