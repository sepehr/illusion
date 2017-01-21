<?php

namespace App;

use Symfony\Component\Console\Command\Command as ConsoleCommand;

abstract class Command extends ConsoleCommand
{
    /**
     * Command constructor.
     *
     * @param string|null $name Command name.
     */
    public function __construct($name = null)
    {
        parent::__construct($name);
    }
}
