<?php

return [

    /**
     * This is a Laravel Loggable package configuration file.
     * Find here all possible thing to configure.
     *
     * Laravel Loggable supports to types of logging - database and file.
     * To use the database type - run the migration to create a needed table.
     * To use the file type - check the files path, feel free to change it.
     * To use both types - run the migration and check files path.
    */

    // If you want to use the database and file drivers,
    // Set it as array ['database', 'file']
    'driver' => 'database',

    // This is the path of the log files.
    // This is required if the driver is/contains the file type.
    // The full path of the file will include the path set below + /ModelName/Month/Date.log
    'storage_path' => storage_path('logs/models')
];
