<?php

namespace App\Controller;

use App\Model\UserRepository;
use Core\Controller\Controller;
use Core\HTML\TemplateForm;


class UserController extends Controller
{
    public function login()
    {
        $this->template = 'default';
        $userrepo = new UserRepository();
        $form = new TemplateForm($_POST);

        if (isset($_GET['loginfb'])) {
            $url = $this->services->getUrlLoginFacebook(['email']);
            header('Location: ' . $url);
        }

        if(!empty($_POST)) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            if ($userrepo->login($email, $password)) {
                $this->redirect('/user/profil');
            }
            $this->addFlashBag('login.bad.password', 'danger');
        }

        if (isset($_GET['login'])) {
            $profil = $this->services->getProfilFacebook();
            $userRepo = $this->services->getRepository('user');
            if (!$userRepo->loginfb($profil->getEmail(), $profil->getId())) {
                $error = $userRepo->register($profil->getEmail(), $profil->getId(), $profil->getId(), $profil->getLastName() , $profil->getFirstName(), $profil->getId());
                $this->addFlashBag($error[0], $error[1]);
                if (!$error[2]) {
                    $this->render('user/login', compact('form'));
                    die;
                }
                $userRepo->login($profil->getEmail(), $profil->getId());
                $this->redirect('/user/profil');
            }
        }

        $this->render('user/login', compact('form'));
    }

    public function register()
    {
        $this->template = 'default';
        $userrepo = new UserRepository();;
        
        if($userrepo->islogged()){
            $this->denied();
        }

        if(!empty($_POST)) {
            $email = $_POST['email'];
            $name = $_POST['name'];
            $firstname = $_POST['firstname'];
            $password = $_POST['password'];
            $password_verif = $_POST['password_verif'];
            $error = $userrepo->register($email, $password, $password_verif, $name, $firstname);
            $this->addFlashBag($error[0], $error[1]);
        }

        $form = new TemplateForm($_POST);
        $this->render('user/register', compact('form'));
    }

    public function logout()
    {
        session_destroy();
        unset($_SESSION['user_id']);
        $this->redirect('/home/index');
    }

    public function profil()
    {
        $this->template = 'default';
        $userrepo = new UserRepository();
        if(!$userrepo->islogged()){
            $this->denied();
        }

        $user = $this->getCurrentUser();
        
        $this->render('user/profil', compact('user'));
    }
}