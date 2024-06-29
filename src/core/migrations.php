<?php

use Illuminate\Database\Capsule\Manager as DbManager;

DbManager::schema()->create('products', function ($table) {
    $table->increments('id');
    $table->string('name')->unique();
    $table->string('price');
    $table->string('type');
    $table->timestamps();
});

DbManager::schema()->create('cart_rules', function ($table) {
    $table->increments('id');
    $table->string('type');
    $table->string('name')->unique();
    $table->string('discount');
    $table->timestamps();
});

echo 'Migrations executed successfully';
