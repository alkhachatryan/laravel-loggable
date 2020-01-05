<?php

namespace Alkhachatryan\LaravelLoggable\Drivers;

abstract class LoggerDriver
{
    /**
     * The name of the model instance.
     *
     * @var string
     */
    protected $model_name;

    /**
     * Package configuration container.
     *
     * @var array
     */
    protected $config;

    /**
     * The incoming action.
     *
     * @var string
     */
    protected $action;

    /**
     * The model instance.
     *
     * @var mixed
     */
    protected $model;

    /**
     * User model instance.
     * Could be null, if the action was made by cron job or some daemon.
     *
     * @var \Illuminate\Contracts\Auth\Authenticatable|null
     */
    protected $user;

    /**
     * The loggable fields of the model.
     *
     * @var null|array
     */
    protected $loggable_fields;

    /**
     * Class construct.
     * Init class properties.
     *
     * @param mixed  $model
     * @param string $action
     * @param array  $config
     * @param  \Illuminate\Contracts\Auth\Authenticatable|null $user
     * @param array  $loggable_fields
     */
    public function __construct($model, $action, $config, $user, $loggable_fields)
    {
        $this->model_name = get_class($model);
        $this->model = $model;
        $this->action = $action;
        $this->config = $config;
        $this->loggable_fields = $loggable_fields;
        $this->user = $user;
    }
}
