<?php

namespace App\Providers;

use App\Models\About;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
        View::share('locales',config('app.locales'));
        if (Schema::hasTable('abouts')) {
            $settings = About::first();
            View::share('settings', $settings);
        }
    }
}
