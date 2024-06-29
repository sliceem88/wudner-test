<?php

/**
 * Load packages
 */
require __DIR__ . '/../vendor/autoload.php';

/**
 * Load .env files
 */
require_once __DIR__ . '/../src/core/env.php';

/**
 * Load DB
 */
require_once  __DIR__ . '/../src/core/db.php';

/**
 * Load routes
 */ 
require_once  __DIR__ . '/../src/core/router.php';
