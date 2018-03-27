<?php

namespace Core\Controller;
require_once "vendor/autoload.php";
require_once "Core/API/api-allocine-helper.php";

use App\Model\Repository;

class Controller extends DoctrineORM {

    protected $path;
    protected $template;
    protected $repository;
    protected $helper;

    /**
     * Controller constructor.
     */
    public function __construct(){
        parent::__construct();
        $this->helper = new \AlloHelper();
        $this->path = 'App/Views/';
        $this->repository = new Repository();
    }


    protected function render($view, $datas = []){
        ob_start();
        extract($datas);
        require($this->path . str_replace('.', '/', $view) . '.php');
        $content = ob_get_clean();
        require($this->path . 'templates/' . $this->template . '.php');
    }

    protected function denied(){
        $this->template = 'default';
        $this->render('error/404');
        die;
    }

    public function getCurrentUser() {
        if(isset($_SESSION['user_id'])) {
            $id = $_SESSION['user_id'];
            $user = $this->entityManager->getRepository('App\Entity\User')->find($id);
            return $user;
        } else {
            return false;
        }
    }

}