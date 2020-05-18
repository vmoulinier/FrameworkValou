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
        $userRepo = $this->services->getRepository('user');
        $form = new TemplateForm($_POST);

        if ($this->request->get('loginfb')) {
            $url = $this->services->getUrlLoginFacebook(['email']);
            header('Location: ' . $url);
        }

        if('POST' === $this->request->getMethod()) {
            $email = $this->request->get('email');
            $password = $this->request->get('password');
            if ($userRepo->login($email, $password)) {
                $this->redirect('/user/profil');
            }
            $this->addFlashBag('login.bad.password', 'danger');
        }

        if ($this->request->get('login')) {
            $profil = $this->services->getProfilFacebook();

            if (!$userRepo->loginfb($profil->getEmail(), $profil->getId())) {
                $error = $userRepo->register($profil->getEmail(), $profil->getId(), $profil->getId(), $profil->getLastName() , $profil->getFirstName(), $profil->getId());
                $this->addFlashBag($error[0], $error[1]);
                if (!$error[2]) {
                    $this->render('user/login', compact('form'));
                    die;
                }
                $userRepo->login($profil->getEmail(), $profil->getId(), true);
            }
            $this->redirect('/user/profil');
        }

        $this->render('user/login', compact('form'));
    }

    public function register()
    {
        $this->template = 'default';
        $userRepo = $this->services->getRepository('user');
        
        if($userRepo->islogged()){
            $this->denied();
        }

        if('POST' === $this->request->getMethod()) {
            $email = $this->request->get('email');
            $name = $this->request->get('name');
            $firstname = $this->request->get('firstname');
            $password = $this->request->get('password');
            $password_verif = $this->request->get('password_verif');
            $error = $userRepo->register($email, $password, $password_verif, $name, $firstname);
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
        $userRepo = $this->services->getRepository('user');

        if(!$userRepo->islogged()){
            $this->denied();
        }

        $user = $this->getCurrentUser();

        $this->render('user/profil', compact('user'));
    }
}
