<?php

return [

    // Example welcome command's config item;
    // Feel free to remove this config item alongside its command.
    'example.config.item' => 'shiva',

    /*
    |--------------------------------------------------------------------------
    | Application
    |--------------------------------------------------------------------------
    | CLI app name, version, debug mode, timezone, environment, etc.
    */

    'name'     => env('APP_NAME', 'Illuminate CLI App'),
    'version'  => env('APP_VERSION', '0.0.1'),
    'env'      => env('APP_ENV', 'production'),
    'debug'    => env('APP_DEBUG', false),
    'timezone' => env('APP_TIMEZONE', 'UTC'),

    /*
    |--------------------------------------------------------------------------
    | Commands
    |--------------------------------------------------------------------------
    | An array of container-aware and non-container-aware command classes to register.
    */

    'commands' => [
        'container-aware' => [
            // Example welcome command;
            // Feel free to remove this as well as the `src/Commands/Example/` directory.
            App\Commands\Example\Welcome::class,
        ],

        'non-container-aware' => [
            //
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Logging
    |--------------------------------------------------------------------------
    | Logging component config options.
    |
    | Before using this you need to run `composer require illuminate/log`
    |
    | A configured instance of `Illuminate\Log\Writer` is accessible via
    | `$this->log` within your commands. It's configured to log into file. If
    | you need another implementation, you first need to require the corresponding
    | package and then edit `bootstrap/app.php` to initialize the logger
    | appropriately.
    */

    'log' => [
        'channel' => 'app',
        'path'    => storage_path('logs/app.log'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Database
    |--------------------------------------------------------------------------
    | Database component config options.
    |
    | Before using this you need to run `composer require illuminate/database`
    |
    | When enabled, a configured instance of `Illuminate\Database\Capsule\Manager` is
    | accessible via `$this->db` within your commands.
    */

    'database' => [
        'driver'    => env('DB_DRIVER', 'mysql'),
        'host'      => env('DB_HOST', 'localhost'),
        'database'  => env('DB_DATABASE', 'illuminate_cli'),
        'username'  => env('DB_USERNAME', 'root'),
        'password'  => env('DB_PASSWORD', ''),
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ],

];
