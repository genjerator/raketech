<?php

namespace App\Providers;

use App\Adapter\CountriesAdapter;
use App\Adapter\RestCountriesAdapter;
use App\Clients\RestCountriesClient;
use App\Interfaces\CountriesDataInterface;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            CountriesDataInterface::class,
            RestCountriesAdapter::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
