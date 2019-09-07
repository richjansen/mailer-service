<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\SendMailerService;

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
