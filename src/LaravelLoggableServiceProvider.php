<?php

namespace Alkhachatryan\LaravelLoggable;

use Illuminate\Support\ServiceProvider;

class LaravelLoggableServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/loggable.php' => config_path('loggable.php'),
        ], 'loggable');
    }
}
