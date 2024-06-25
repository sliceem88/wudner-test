<?php

use Illuminate\Database\Capsule\Manager as DbManager;

$capsule = new DbManager();

$capsule->addConnection([
    'driver' => 'sqlite',
    'database' => __DIR__ . '/../../wunder.sqlite',
    'prefix' => "",
 ]);

$capsule->setAsGlobal();
$capsule->bootEloquent();
