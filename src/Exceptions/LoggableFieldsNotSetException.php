<?php

namespace Alkhachatryan\LaravelLoggable\Exceptions;

use Exception;

class LoggableFieldsNotSetException extends Exception
{
    public function __construct($model_name)
    {
        $message = sprintf('Loggable fields not set for %s model when edit action', $model_name);

        parent::__construct($message, 0, null);
    }
}
