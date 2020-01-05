<?php

namespace Alkhachatryan\LaravelLoggable\Facades;

use Illuminate\Database\Eloquent\Collection;

/**
 * Laravel Loggable package Facade.
 *
 * @package LaravelLoggable
 *
 * @method Collection model(string $model_name, $limit = 50)
*/
class Loggable extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
        return 'loggable';
    }
}
