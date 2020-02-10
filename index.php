<?php

session_start();

require_once 'App/Autoload.php';
require_once 'Core/Autoload.php';
require_once 'env.php';

App\Autoloader::register();
Core\Autoloader::register();

if(isset($_GET['p'])){
    $page = $_GET['p'];
}else{
    $page = 'home/index';
}

if (ENV === 'prod') {
    error_reporting(0);
    ini_set('display_errors', 0);
}

$page = explode('/', $page);

if(class_exists('\App\Controller\\' . ucfirst($page[0]) . 'Controller')) {
    if(!isset($page[1])) {
        $page = 'error';
        $controller = '\App\Controller\\' . ucfirst($page) . 'Controller';
        $action = $page;
    } else {
        if(method_exists('\App\Controller\\' . ucfirst($page[0]) . 'Controller', $page[1])){
            $controller = '\App\Controller\\' . ucfirst($page[0]) . 'Controller';
            $action = $page[1];
        }
        else {
            $page = 'error';
            $controller = '\App\Controller\\' . ucfirst($page) . 'Controller';
            $action = $page;
        }
    }
} else {
    $page = 'error';
    $controller = '\App\Controller\\' . ucfirst($page) . 'Controller';
    $action = $page;
}

$controller = new $controller();
$controller->$action();
