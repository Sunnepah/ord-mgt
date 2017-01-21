<?php

require '../vendor/autoload.php';

session_start();

$app = \Lustre\Application::singleton();

/*
|-------------------------------------------------------------------
| Register Application Routes
|-------------------------------------------------------------------
*/
require __DIR__ . '/../application/routes.php';

/*
|-------------------------------------------------------------------
| Running the Application
|-------------------------------------------------------------------
*/
$app->run();