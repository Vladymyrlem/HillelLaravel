<?php

namespace App\Providers;

use App\Services\Geo\UAParserService;
use App\Services\Geo\UserAgentServiceInterface;
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
        $this->app->singleton(UserAgentServiceInterface::class, function () {
            return new UAParserService();
//            return new IpApiGeoService();
        });
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
