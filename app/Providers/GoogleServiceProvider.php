<?php

namespace App\Providers;

use Google_Client;
use Google_Service_Books;
use Illuminate\Support\ServiceProvider;

class GoogleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Google_Client::class, function ($app) {
            $client = new Google_Client();
            $client->setApplicationName("Google Books with PHP Tutorial Application");
            $client->setDeveloperKey(getenv('GOOGLE_CLIENT_ID'));
            return new Google_Service_Books($client);
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
