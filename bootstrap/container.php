<?php

use Monolog\Logger;
use Illuminate\Log\Writer;
use Illuminate\Config\Repository;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Database\Capsule\Manager as Capsule;

$container = new Container;

$container->instance('config', $config = new Repository(require config_path('app.php')));

$container->singleton('files', function () {
    return new Filesystem;
});

$container->singleton('events', function ($container) {
    return new Dispatcher($container);
});

$container->singleton('log', function () use ($config) {
    $logger = new Writer(
        new Logger($config->get('log.channel'))
    );

    $logger->useFiles($config->get('log.path'));

    return $logger;
});

$container->singleton('db', function ($container) use ($config) {
    $capsule = new Capsule($container);

    $capsule->addConnection($config->get('database'));
    $capsule->setEventDispatcher($container->make('events'));

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
});

return $container;
