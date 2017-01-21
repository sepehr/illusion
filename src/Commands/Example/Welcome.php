<?php

namespace App\Commands\Example;

use App\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputOption;
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
            ->addArgument('name', InputArgument::OPTIONAL, 'Name to greet to.')
            ->addOption('log', 'l', InputOption::VALUE_NONE, 'Whether to add a log entry or not.')
            ->addOption('event', 'e', InputOption::VALUE_NONE, 'Whether to fire an event or not.');
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

        $output->writeln("
            This was just an example command; You can use this as a starting point for your new commands.
            
            Feel free to remove this by:
            - Removing src/Commands/Example directory
            - Unregistering the class from config/app.php
            - Removing the sample config item from config/app.php
            
            Also, take a look at the source code to see some usage examples of resolving components out of the container.
        ");

        //
        // Examples of resolving components out of the container:
        //

        // Config component is loaded by default
        //$this->config->get('example.config.item');

        // Requires `components.logging` to be `true`
        $input->getOption('log') && $this->log->info('This is sample info log entry...');

        // Requires `components.events` to be `true`
        $input->getOption('event') && $this->events->fire('example.welcome.done');

        // Requires `components.filesystem` to be `true`
        //$this->files->put(storage_path('test.txt'), 'some sample content...');

        // Requires `components.database` to be `true`
        //$this->db->table('users')->get();
    }
}
