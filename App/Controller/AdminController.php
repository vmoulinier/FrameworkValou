<?php

namespace App\Controller;

use Core\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
        if('POST' === $this->request->getMethod()) {
            $repo = $this->services->getRepository('translations');
            $id = $this->request->get('id');
            $id_delete = $this->request->get('id_delete');

            if($id) {
                $name = $this->request->get('name');
                $fr = $this->request->get('fr');
                $en = $this->request->get('en');
                $repo->updateTranslation($id, $name, $fr, $en);
            }

            if($this->request->get('add')) {
                $name = $this->request->get('name');
                $fr = $this->request->get('fr');
                $en = $this->request->get('en');
                $repo->addTranslation($name, $fr, $en);
            }

            if($id_delete) {
                $repo->removeTranslation($id_delete);
            }

            if($this->request->get('search')) {
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
        $users = [];

        if('POST' === $this->request->getMethod()) {
            $id = $this->request->get('login');

            if($id) {
                $adminRepo->login($id);
                $this->redirect('/home/index');
            }

            if($this->request->get('search')) {
                $name = $this->request->get('name');
                $email = $this->request->get('email');
                $id = $this->request->get('id');
                $users = $userRepo->search($name, $email, (int) $id);
            }
        }

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