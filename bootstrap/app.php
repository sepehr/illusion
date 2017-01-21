<?php

require_once 'autoload.php';

use Symfony\Component\Console\Application;

$container   = require_once 'container.php';
$application = new Application($container->config->get('name'), $container->config->get('version'));

$application->addCommands(array_map(
    function ($command) use ($container) {
        return new $command($container);
    },
    $container->config->get('commands.container-aware')
));

$application->addCommands(array_map(
    function ($command) {
        return new $command;
    },
    $container->config->get('commands.non-container-aware')
));

set_time_limit(0);
date_default_timezone_set($container->config->get('timezone'));

return $application;
