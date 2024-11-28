<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
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
        Validator::extend('valid_domain', function ($attribute, $value, $parameters, $validator) {
            $domain = substr(strrchr($value, "@"), 1);
            
            return checkdnsrr($domain, "MX"); 
        });
    }
}
