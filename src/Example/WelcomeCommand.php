<?php

namespace App\Example;

use App\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class WelcomeCommand extends Command
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
    }
}
