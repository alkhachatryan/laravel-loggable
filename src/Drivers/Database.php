<?php

namespace Alkhachatryan\LaravelLoggable\Drivers;

class Database
{
    public function prepend(){
        $model_name = str_replace('\\', '', $this->model_name);
        $storage_path = $this->config['storage_path']
            . '/' . $model_name
            . '/' . date('YF');

        $file_path = $storage_path . '/' . date('d') . '.log';

        if(! \Illuminate\Support\Facades\File::exists($file_path))
            mkdir($storage_path , 0755, true);

        $text = "Created $this->model_name model";

        File::prepend($file_path, 'asdf');
    }
}
