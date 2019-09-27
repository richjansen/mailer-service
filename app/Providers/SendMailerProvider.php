<?php

namespace App\Providers;

use App\Repositories\MailRepository;
use App\Repositories\RecipientRepository;
use App\Services\MailApis\Mailjet;
use App\Services\MailApis\MailjetApi;
use App\Services\MailApis\SendGridApi;
use App\Services\SendMailer\HandleResponseService;
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

        // Repositories
        $this->app->singleton(MailRepository::class, function ($app) {
            return new MailRepository();
        });

        $this->app->singleton(RecipientRepository::class, function ($app) {
            return new RecipientRepository();
        });

        // SendMailerService
        $this->app->singleton(SendMailerService::class, function ($app) {
            $sendMailerService = new SendMailerService(
                $app->get(MailRepository::class),
                $app->get(RecipientRepository::class)
            );
            $sendMailerService
                ->setMailSettings(config('sendmailer')['mail-settings'])
                ->addClient($app->get(SendGridApi::class)) // primary api
                ->addClient($app->get(MailjetApi::class))  // fallback api
            ;
            return $sendMailerService;
        });

        // HandleResponseService
        $this->app->singleton(HandleResponseService::class, function ($app) {
            $handleResponseService = new HandleResponseService();
            $handleResponseService->setMailSettings(config('sendmailer')['mail-settings']);
            return $handleResponseService;
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
