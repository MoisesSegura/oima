<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

use ReCaptcha\ReCaptcha;
use Illuminate\Support\Facades\Validator;

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
        Model::unguard();

        if (app()->environment('production')) {
            URL::forceScheme('https');
        }

        view()->composer('*', function ($view) {
            $view->with('socialmedia', \App\Models\SocialMedia::all());
        });

        
    }
}
