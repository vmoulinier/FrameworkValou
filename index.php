<?php

session_start();

require_once 'App/Autoload.php';
require_once 'Core/Autoload.php';

App\Autoloader::register();
Core\Autoloader::register();

new \Core\Config\Router();

if (ENV === 'prod') {
    error_reporting(0);
    ini_set('display_errors', 0);
}
