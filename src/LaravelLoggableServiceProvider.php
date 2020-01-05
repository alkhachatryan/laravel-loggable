<?php

namespace Alkhachatryan\LaravelLoggable;

use Alkhachatryan\LaravelLoggable\Accessors\Accessor;
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
        $this->app->bind('loggable', function () {
            return new Accessor();
        });
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

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}
