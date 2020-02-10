<?php

namespace Core\Controller;
require_once "vendor/autoload.php";

use App\Model\Repository;
use Core\Services\Services;
use Core\Services\Twig;

class Controller {

    protected $path;
    protected $template;
    protected $repository;
    protected $services;
    protected $flashBag = [];


    /**
     * Controller constructor.
     */
    public function __construct(){
        $this->path = 'App/Views/';
        $this->repository = new Repository();
        $this->services = new Services();
        $this->twig = new Twig();
        $this->dataValidator();
    }

    protected function render($view, $datas = [])
    {
        ob_start();
        extract($datas);
        require($this->path . str_replace('.', '/', $view) . '.php');
        $flashBag = $this->flashBag;
        $content = ob_get_clean();
        require($this->path . 'templates/' . $this->template . '.php');
    }

    protected function denied()
    {
        $this->template = 'default';
        $this->render('error/404');
        die;
    }

    public function getCurrentUser()
    {
        if(isset($_SESSION['user_id'])) {
            $id = $_SESSION['user_id'];
            return $this->services->getDoctrine()->getRepository('App\Entity\User')->find($id);
        }
        return false;
    }

    public function redirect($path)
    {
        header('Location: '.PATH.$path);
    }

    public function dataValidator()
    {
        if(!empty($_POST)) {
            foreach ($_POST as $key => $data) {
                $_POST[$key] = htmlspecialchars($data);
            }
        }
    }

    public function addFlashBag($content, $type = 'success')
    {
        $this->flashBag[0] = $content;
        $this->flashBag[1] = $type;
    }

}
