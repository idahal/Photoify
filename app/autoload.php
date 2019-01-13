<?php

declare(strict_types=1);

// start the session
session_start();

// set the default timezone to Coordinated Universal Time.
date_default_timezone_set('UTC');

// set the default character encoding to UTF-8.
mb_internal_encoding('UTF-8');

// include the helper functions.
require __DIR__.'/functions.php';

// fetch the global configuration array.
$config = require __DIR__.'/config.php';

// setup the database connection.
$pdo = new PDO($config['database_path']);
