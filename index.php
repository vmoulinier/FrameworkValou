<?php

session_start();

require_once 'App/Autoload.php';
require_once 'Core/Autoload.php';

define('ROOT', dirname(str_replace('\\', '/', __DIR__)));
define('PATH', 'http://localhost/test');

App\Autoloader::register();
Core\Autoloader::register();

if(isset($_GET['p'])){
    $page = $_GET['p'];
}else{
    $page = 'home/index';
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

function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

