<?php

require_once 'autoload.php';

use Illuminate\Config\Repository;
use Illuminate\Container\Container;
use Symfony\Component\Console\Application;

$container = new Container;

$container->instance('config', $config = new Repository(require config_path('app.php')));

$container->singleton('files', function () {
    return new Illuminate\Filesystem\Filesystem;
});

$container->singleton('events', function ($container) {
    return new Illuminate\Events\Dispatcher($container);
});

$container->singleton('log', function () use ($config) {
    $logger = new Illuminate\Log\Writer(
        new Monolog\Logger($config->get('log.channel'))
    );

    $logger->useFiles($config->get('log.path'));

    return $logger;
});

$container->singleton('db', function ($container) use ($config) {
    $capsule = new Illuminate\Database\Capsule\Manager($container);

    $capsule->addConnection($config->get('database'));
    $capsule->setEventDispatcher($container->make('events'));

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
});

$app = new Application($config->get('name'), $config->get('version'));

$app->addCommands(array_map(function ($command) use ($container) {
    return new $command($container);
}, $config->get('commands.container-aware')));

$app->addCommands(array_map(function ($command) {
    return new $command;
}, $config->get('commands.non-container-aware')));

// Misc. setup
date_default_timezone_set($config->get('timezone'));

return $app;
