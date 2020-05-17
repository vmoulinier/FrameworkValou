<?php

namespace App\Controller;

use Core\Controller\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        //if is not logged admin, then acces denied in env prod
        if (ENV === 'prod') {
            if(!$this->twig->loggedAdmin()){
                $this->denied();
            }
        }
    }

    public function index()
    {
        $this->template = 'admin';
        $this->render('admin/index');
    }

    public function translations()
    {
        if(!empty($_POST)) {
            $repo = $this->services->getRepository('translations');

            if(isset($_POST['id'])) {
                $repo->updateTranslation();
            }

            if(isset($_POST['add'])) {
                $repo->addTranslation();
            }

            if(isset($_POST['id_delete'])) {
                $repo->removeTranslation();
            }

            if(isset($_POST['search'])) {
                $translation = $_POST['search'];
                $translations = $repo->findTranslation($translation);
                $this->template = 'disable';
                $this->render('admin/translations-data-display', compact('translations'));
                die;
            }
        }

        $this->template = 'admin';
        $this->render('admin/translations');
    }

    public function users()
    {
        $userRepo = $this->services->getRepository('user');
        $adminRepo = $this->services->getRepository('admin');

        if(!empty($_POST)) {
            if(isset($_POST['login'])) {
                $adminRepo->login($_POST['login']);
                $this->redirect('/home/index');
            }
        }

        $users = $userRepo->findAll();

        $this->template = 'admin';
        $this->render('admin/users', compact('users'));
    }

    public function relog()
    {
        $_SESSION['user_id'] = $_SESSION['edit_admin_id'];
        unset($_SESSION['edit_admin_id']);
        $this->redirect('/admin/index');
    }
}