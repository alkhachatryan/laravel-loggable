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
     * Class construct.
     * Init class properties.
     *
     * @param mixed  $model
     * @param string $action
     * @param array  $config
     */
    public function __construct($model, $action, $config){
        $this->model_name  = get_class($model);
        $this->model       = $model;
        $this->action      = $action;
        $this->config      = $config;
    }
}
