<?php

namespace App\Providers;

use Arr;
use Auth;
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
        //
        // $this->register();
        Auth::provider('custom', function ($app, array $config) {
            return new ApiUserProvider();
        });
    }
}
