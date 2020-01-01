<?php

namespace Alkhachatryan\LaravelLoggable;

use App\Exceptions\LoggableFieldsNotSetException;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Logger
{
    /**
     * The model instance.
     *
     * @var mixed
     */
    private $model;

    /**
     * The name of the model instance.
     *
     * @var string
     */
    private $model_name;

    /**
     * The incoming action.
     *
     * @var string
     */
    private $action;

    /**
     * The loggable fields of the model.
     *
     * @var null|string
     */
    private $loggable_fields;

    /**
     * The loggable actions of the model.
     *
     * @var null|string|array
     */
    private $loggable_actions;

    /**
     * The flag which determines if logger should create a log record for current model and action.
     * Depends on the incoming model specifications and configuration file.
     *
     * @var bool
     */
    private $should_log = true;

    /**
     * Class construct.
     * If there created the object of this class - the model has included Loggable trait.
     *
     * @throws LoggableFieldsNotSetException
     * @param  mixed  $model
     * @param  string $action
     * @return void
     */
    public function __construct($model, $action){
        $this->model            = $model;
        $this->action           = $action;
        $this->model_name       = get_class($model);
        $this->config           = config('loggable');
        $this->loggable_actions = $model->loggable_actions;
        $this->loggable_fields  = $model->loggable_fields;

        $this->prepareData();
    }

    /**
     * Set the model properties which are not set.
     * In case if the loggable actions not specified - get from config file.
     * @see config.loggable.actions
     *
     * If the action is EDIT, but there is no specified fields - throw new exception.
     * Notice: before throwing new exception - the model already saved.
     *
     * Check if this action should be logged, depending on the model properties or configuration file.
     *
     * @throws LoggableFieldsNotSetException
     *
     * @return void
     */
    private function prepareData(){
        if($this->action === 'edit' && !$this->model->loggable_fields)
            throw new LoggableFieldsNotSetException($this->model_name);

        if(
            // If there is no specified actions in the model - get from config.
            // If the config field is an array - check if the action in the array.
            // Else if the field is a string - check if the action equals incoming action.
            // If false - not log.
            (! $this->loggable_actions
                && (
                    (is_array($this->config['actions']) && !in_array($this->action, $this->config['actions']))
                    || (is_string($this->config['actions']) && $this->config['actions'] !== $this->action)
                )
            )

            // If there is/are specified action(s) in the model,
            // And If the field is an array - check if the action in the array.
            // Else if the field is a string - check if the action equals incoming action.
            // If false - not log.
            || (
                (is_array($this->loggable_actions) && !in_array($this->action, $this->loggable_actions))
                || (is_string($this->loggable_actions) && $this->loggable_actions !== $this->action)
            )
        )
            $this->should_log = false;
    }

    /**
     * Create a new log record if SHOULD_LOG is true.
     *
     * @return void
     */
    public function record(){
        if(! $this->should_log)
            return;

        $drivers = $this->config['driver'];

        if(is_string($drivers))
            $drivers = [$drivers];

        foreach (array_unique($drivers) as $driver){
            if($driver === 'file')
                $this->logAddInFile();
            else
                $this->logAddInDatabase();
        }
    }

    /**
     * Add a log record in a file.
     *
     * @return void
     */
    private function logAddInFile(){
        $model_name = str_replace('\\', '', $this->model_name);
        $storage_path = $this->config['storage_path']
            . '/' . $model_name
            . '/' . date('YF');

        $file_path = $storage_path . '/' . date('d') . '.log';

        if(! File::exists($file_path))
            mkdir($storage_path , 0755, true);

        File::prepend($file_path, 'asdf');
    }

    /**
     * Add a log record in a database.
     *
     * @return void
     */
    private function logAddInDatabase(){}


    private function logFileTemplate($model){

    }
}
