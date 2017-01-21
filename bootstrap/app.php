<?php

require_once 'autoload.php';

use Illuminate\Config\Repository;
use Illuminate\Container\Container;
use Symfony\Component\Console\Application;

define('BASE_PATH', realpath(__DIR__ . '/..'));
define('LOGS_PATH', BASE_PATH . '/logs');
define('CONFIG_PATH', BASE_PATH . '/config');

$config = new Repository(require CONFIG_PATH . '/app.php');

$container = new Container;
$container->instance('config', $config);

$app = new Application($config->get('name'), $config->get('version'));

// Register container-aware commands
$app->addCommands(array_map(function ($command) use ($container) {
    return new $command($container);
}, $config->get('commands.container-aware')));

// Register non-container-aware commands
$app->addCommands(array_map(function ($command) {
    return new $command;
}, $config->get('commands.non-container-aware')));

return $app;
