<?php

namespace Alkhachatryan\LaravelLoggable;

use Alkhachatryan\LaravelLoggable\Exceptions\LoggableFieldsNotSetException;

trait Loggable
{
    /**
     * Register eloquent events of model.
     *
     * @return void
     */
    public static function bootLoggable()
    {
        self::created(function ($model) {
            self::log($model, 'create');
        });

        self::updated(function ($model) {
            self::log($model, 'edit');
        });

        self::deleted(function ($model) {
            self::log($model, 'delete');
        });
    }

    /**
     * Create and call the logger base class with collected data.
     *
     * @throws LoggableFieldsNotSetException
     * @param mixed $model
     * @param string $action
     * @return void
     */
    private static function log($model, $action)
    {
        $logger = new Logger($model, $action);
        $logger->record();
    }
}
