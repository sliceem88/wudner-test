<?php

use Leaf\Router;

Router::post("/product", "\App\Controllers\CreateProductController@index");

Router::run();
