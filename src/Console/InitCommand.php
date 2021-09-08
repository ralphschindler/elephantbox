<?php

namespace Elephantbox\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class InitCommand extends Command
{
    public function __construct()
    {
        parent::__construct('init');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $applicationName = 'my-app';
        $hasMysql = true;
        $hasRedis = true;

        $generator = new class ($applicationName, $hasMysql, $hasRedis) {

        };

        file_put_contents('docker-compose.yml', $generator->generate());

        $output->write('docker-compose.yml was written, `docker-compose up -d` to start your project');

        return 0;
    }
}
