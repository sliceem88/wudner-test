<?php
require './vendor/autoload.php';

/**
 * Load DB
 */
require_once  __DIR__ . '/src/core/db.php';

use splitbrain\phpcli\CLI;
use splitbrain\phpcli\Options;

/**
 * https://github.com/splitbrain/php-cli
 */
class Minimal extends CLI
{
    protected function setup(Options $options)
    {
        $options->setHelp('Migration -  command to execute all migrations');
        $options->registerOption('run', 'run mighrations', 'r');
    }

    protected function main(Options $options)
    {
        if ($options->getOpt('run')) {
            require_once './src/core/migrations.php';
        }
    }
}

$cli = new Minimal();
$cli->run();