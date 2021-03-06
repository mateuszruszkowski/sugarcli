<?php

namespace SugarCli\Tests\Console\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use SugarCli\Console\Command\AbstractConfigOptionCommand;

class TestConfigOptionCommand extends AbstractConfigOptionCommand
{
    protected function configure()
    {
        $this->addConfigOptionMapping('path', 'sugarcrm.path')
            ->addConfigOptionMapping('url', 'sugarcrm.url')
            ->addConfigOption(
                'url',
                'u',
                InputOption::VALUE_REQUIRED,
                'Public url of SugarCRM.'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $path = $this->getConfigOption($input, 'path');
        $output->writeln('path: ' . $path);
        $url = $this->getConfigOption($input, 'url');
        $output->writeln('url: ' . $url);
    }
}
