<?php

namespace App\Providers;

use App\Contracts\Api\ApiCurrencyConversion;
use App\Services\Api\ApiCurrencyConversionService;
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
        $this->app->bind(ApiCurrencyConversion::class, ApiCurrencyConversionService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
