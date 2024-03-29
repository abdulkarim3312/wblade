<?php

namespace App\Providers;

use App\Http\Controllers\Admin\SettingController;
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
        View::composer('frontend.*', SettingController::class);
        View::composer('auth.*', SettingController::class);
    }
}
