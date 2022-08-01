<?php

namespace App\Providers;

use App\Classes\Geral;
use Illuminate\Support\ServiceProvider;

class GeralServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('geral',function (){
            return new Geral;
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
