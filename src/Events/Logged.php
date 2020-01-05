<?php

namespace Alkhachatryan\LaravelLoggable\Events;

class Logged
{
    /**
     * User model instance.
     * Could be null, if the action was made by cron job or some daemon.
     *
     * @var \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public $user;

    /**
     * The logged action name.
     *
     * @var string
     */
    public $action;

    /**
     * The model instance.
     *
     * @var mixed
     */
    public $model;

    /**
     * The driver which saved the log record.
     *
     * @var string
     */
    public $driver;

    /**
     * Create a new event instance.
     *
     * Handle the event, action, driver and user parameters.
     *
     * @param mixed $model
     * @param string $action
     * @param string $driver
     * @param \Illuminate\Contracts\Auth\Authenticatable|null $user
     *
     * @return void
     */
    public function __construct($model, $action, $driver, $user = null)
    {
        $this->model  = $model;
        $this->action = $action;
        $this->driver = $driver;
        $this->user   = $user;
    }
}
