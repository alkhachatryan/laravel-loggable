<?php

namespace Alkhachatryan\LaravelLoggable\Drivers;

use Alkhachatryan\LaravelLoggable\Models\LoggableModel;

class Database extends LoggerDriver
{
    /**
     * Insert the log record into table.
     *
     * @return void
    */
    public function insert(){
        $user_id = $this->user ? $this->user->id : null;
        $data    = null;

        if($this->action === 'create')
            $data = $this->model;

        else if($this->action === 'edit')
            $data = [
                'before' => array_intersect_key($this->model->getOriginal(),
                    array_intersect_key($this->model->getChanges(),
                        array_flip($this->loggable_fields))),
                'after'  => array_intersect_key($this->model->getChanges(),
                    array_flip($this->loggable_fields))
            ];

        LoggableModel::create([
            "user_id" => $user_id,
            "model_name" => $this->model_name,
            "model_id" => $this->model->id,
            "action" => $this->action,
            "data" => json_encode($data)
        ]);
    }
}
