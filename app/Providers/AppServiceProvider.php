<?php

namespace App\Providers;

use App\Client;
use App\Observers\ClientObserver;
use App\Observers\PhoneObserver;
use App\Phone;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Client::observe(ClientObserver::class);
        Phone::observe(PhoneObserver::class);
    }
}
