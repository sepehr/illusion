<?php

return [

    // Example welcome command's config item;
    // Feel free to remove this config item alongside its command.
    'example.config.item' => 'shiva',

    /*
    |--------------------------------------------------------------------------
    | Application
    |--------------------------------------------------------------------------
    | CLI app name, version, debug mode, timezone, environment, etc. and commands.
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
            // Feel free to remove this as well as the src/Commands/Example/ directory.
            App\Commands\Example\Welcome::class,

            //
        ],

        'non-container-aware' => [
            //
        ],
    ],

];
