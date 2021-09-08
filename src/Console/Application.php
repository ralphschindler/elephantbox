<?php

namespace Elephantbox\Console;

use Symfony\Component\Console\Application as ConsoleApplication;

class Application
{
    public function run()
    {
        $application = new ConsoleApplication;
        $application->setName('Elephantbox');

        $application->addCommands([
            new InitCommand()
        ]);

        $application->run();
    }
}

