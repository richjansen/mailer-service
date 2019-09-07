<?php

namespace App\Providers;

use App\Services\MailApis\Mailjet;
use Illuminate\Support\ServiceProvider;
use App\Services\SendMailer\SendMailerService;

class SendMailerProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(SendMailerService::class, function ($app) {
            return new SendMailerService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
