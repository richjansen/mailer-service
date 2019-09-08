<?php

namespace App\Providers;

use App\Services\MailApis\Mailjet;
use App\Services\MailApis\MailjetApi;
use App\Services\MailApis\SendGridApi;
use Mailjet\Client as MailjetClient;
use SendGrid;
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
        // SendGrid
        $this->app->singleton(SendGrid::class, function ($app) {
            return new SendGrid(config('sendmailer')['apis']['sendgrid']['args']['api-key']);
        });

        $this->app->singleton(SendGridApi::class, function ($app) {
            return new SendGridApi(
                config('sendmailer')['mail-settings'],
                $app->get(SendGrid::class)
            );
        });

        // Mailjet
        $this->app->singleton( MailjetClient::class, function ($app) {
            $config = config('sendmailer.apis.mailjet.args');
            return new  MailjetClient($config['key'], $config['secret'], true, $config['settings']);
        });

        $this->app->singleton(MailjetApi::class, function ($app) {
            return new MailjetApi(
                $app->get(MailjetClient::class)
            );
        });

        // SendMailerService
        $this->app->singleton(SendMailerService::class, function ($app) {
            $sendMailerService = new SendMailerService();
            $sendMailerService
                ->addApi($app->get(SendGridApi::class)) // primary api
                ->addApi($app->get(MailjetApi::class)) // fallback api
            ;
            return $sendMailerService;
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
