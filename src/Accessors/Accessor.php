<?php

namespace Alkhachatryan\LaravelLoggable\Accessors;

use Alkhachatryan\LaravelLoggable\Models\LoggableModel;
use Illuminate\Database\Eloquent\Collection;

class Accessor
{
    /**
     * Paginate the logs for given model.
     *
     * @param string $model_name
     * @param int    $limit
     *
     * @return Collection
     */
    public function model($model_name, $limit = 50)
    {
        return LoggableModel::whereModelName($model_name)->orderBy('id', 'DESC')->paginate($limit);
    }
}
