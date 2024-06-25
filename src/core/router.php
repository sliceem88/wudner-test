<?php

use Leaf\Router;

Router::get("/", "\App\Controllers\BaseController@index");

Router::run();
