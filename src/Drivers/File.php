<?php

namespace Alkhachatryan\LaravelLoggable\Drivers;

class File extends LoggerDriver
{
    /**
     * Class construct.
     * Init class properties.
     *
     * @param mixed  $model
     * @param string $action
     * @param array  $config
     */
    public function __construct($model, $action, $config){
        parent::__construct($model, $action, $config);
    }

    /**
     * Prepend the log text to the log file.
     * Create a new file if the file is not exist.
     *
     * @return void
    */
    public function prepend(){
        $model_name = str_replace('\\', '', $this->model_name);
        $storage_path = $this->config['storage_path']
            . '/' . $model_name
            . '/' . date('YF');

        $file_path = $storage_path . '/' . date('d') . '.log';

        if(! \Illuminate\Support\Facades\File::exists($file_path))
            mkdir($storage_path , 0755, true);

        File::prepend($file_path, 'asdf');
    }

    /**
     * Get the template for incoming action.
     *
     * @param string $action
     * @param mixed  $model
    */
    private function templateFor($action, $model){
        if($action === 'create')
            return ""
    }
}
