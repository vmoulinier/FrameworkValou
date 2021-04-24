<?php

namespace Core\Config;
require_once 'Core/Config/env.php';
require_once 'vendor/autoload.php';

class Router {

    private $router;

    public function __construct()
    {
        $this->router = new \AltoRouter();
        $this->routing();
        $this->targets();
    }

    public function routing()
    {
        //home
        $this->router->map('GET', '/'.PROJECT_NAME.'/', 'home/index', 'index');
        $this->router->map('GET', '/'.PROJECT_NAME.'/index', 'home/index', 'home_index');

        //user
        $this->router->map('GET', '/'.PROJECT_NAME.'/register', 'user/register', 'user_register');
        $this->router->map('GET|POST', '/'.PROJECT_NAME.'/login/[a:fb]?', 'user/login', 'user_login');
        //$this->router->map('POST', '/'.PROJECT_NAME.'/login/[a:fb]?', 'user/login', 'user_login_post');
        $this->router->map('GET', '/'.PROJECT_NAME.'/logout', 'user/logout', 'user_logout');
        $this->router->map('GET', '/'.PROJECT_NAME.'/loginfb/[a:fb]?', 'user/loginfb', 'user_loginfb');
        $this->router->map('GET', '/'.PROJECT_NAME.'/profil', 'user/profil', 'user_profil');

        //admin
        $this->router->map('GET', '/'.PROJECT_NAME.'/admin', 'admin/index', 'admin_index');
        $this->router->map('GET|POST', '/'.PROJECT_NAME.'/admin/translations', 'admin/translations', 'admin_translations');
        //$this->router->map('POST', '/'.PROJECT_NAME.'/admin/translations', 'admin/translations', 'admin_translations_post');
        $this->router->map('GET|POST', '/'.PROJECT_NAME.'/admin/users', 'admin/users', 'admin_users');
        //$this->router->map('POST', '/'.PROJECT_NAME.'/admin/users', 'admin/users', 'admin_users_post');
        $this->router->map('GET', '/'.PROJECT_NAME.'/admin/relog', 'admin/relog', 'admin_relog');
    }

    public function targets()
    {
        $target = ['error', 'error'];
        $match = $this->router->match();

        if ($match) {
            $target = explode('/', $match['target']);
        }

        $controller = '\App\Controller\\' . ucfirst($target[0]) . 'Controller';
        $action = $target[1];

        $controller = new $controller($this->router);
        $params = $match['params'] ?? [];
        $controller->$action($params);
    }
}
