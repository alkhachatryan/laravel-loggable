<?php

namespace Alkhachatryan\LaravelLoggable\Models;

use Illuminate\Database\Eloquent\Model;

class LoggableModel extends Model
{
    /**
     * Specify the table name.
     *
     * @var string
     */
    protected $table = 'model_logs';

    /**
     * Fillable columns.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'model_name', 'model_id', 'action', 'data'];

    /**
     * Disable default timestamps.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Specify the custom date timestamp column.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->date = $model->freshTimestamp();
        });
    }
}
