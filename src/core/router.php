<?php

use Leaf\Router;

Router::post("/product", "\App\Controllers\ProductController@create");
Router::get("/product", "\App\Controllers\ProductController@get");

Router::post("/rule", "\App\Controllers\RuleController@create");
Router::get("/rule", "\App\Controllers\RuleController@get");

Router::run();
