<?php

namespace App\Commands\Example;

use App\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Welcome extends ContainerAwareCommand
{
    /**
     * Command configurer.
     *
     * @return void
     */
    protected function configure()
    {
        $this
            ->setName('example:welcome')
            ->setDescription('Greets you with a welcome message!')
            ->setHelp('An example welcome command; feel free to remove this from bin/app.')
            ->addArgument('name', InputArgument::OPTIONAL, 'Name to greet to.');
    }

    /**
     * Command executor.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $greet = ($greet = $input->getArgument('name'))
            ? "Welcome to the machine, $greet!"
            : 'Welcome to the machine!';

        $output->writeln($greet);

        if ($config = $this->config->get('example.config.item')) {
            $output->writeln("Also read this name from config files: $config");
        }

        $output->writeln("
This is just an example command; You can use this as a starting point for your new commands.

Feel free to remove this by:
- Removing src/Commands/Example directory
- Unregistering the class from config/app.php
- Removing the sample config item from config/app.php
        ");
    }
}
