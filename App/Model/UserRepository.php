<?php

namespace App\Model;


use App\Entity\User;
use Core\Services\Services;

class UserRepository
{
    public $entityManager;

    /**
     * UserRepository constructor.
     */
    public function __construct()
    {
        $this->entityManager = new Services();
    }


    public function register($email, $password, $password_verif, $nom, $prenom): string
    {
        $users = $this->entityManager->getDoctrine()->getRepository('App\Entity\User')->findOneBy(['email' => $email]);

        if(!$users) {
            if($password === $password_verif) {
                $password = sha1($password);
                $user = new User();
                $user->setNom($nom);
                $user->setPrenom($prenom);
                $user->setEmail($email);
                $user->setPassword($password);
                $user->setGroupe(null);
                $this->entityManager->getDoctrine()->persist($user);
                $this->entityManager->getDoctrine()->flush();
                $error = "Compte enregistré !";
            } else {
                $error = "Vos mots de passes sont différents.";
            }
        } else {
            $error = "Email déjà existant";
        }
        return $error;
    }

    public function login($email, $password): bool
    {
        $user = $this->entityManager->getDoctrine()->getRepository('App\Entity\User')->findOneBy(['email' =>$email, 'password' =>sha1($password)]);
        if($user) {
            if($user->getType() == 'ROLE_ADMIN'){
                $this->saveSessionAdmin($user->getId(), $user->getType());
                return true;
            }
            $this->saveSession($user->getId());
            return true;
        }
        return false;
    }

    public function loginfb($email, $facebookId): bool
    {
        $user = $this->entityManager->getDoctrine()->getRepository('App\Entity\User')->findOneBy(['email' =>$email, 'facebook_id' => $facebookId]);
        if($user) {
            if($user->getType() == 'ROLE_ADMIN'){
                $this->saveSessionAdmin($user->getId(), $user->getType());
                return true;
            }
            $this->saveSession($user->getId());
            return true;
        }
        return false;
    }

    public function islogged(): bool
    {
        if(isset($_SESSION['user_id'])) {
            return true;
        }
        return false;
    }

    public function isloggedAdmin(): bool
    {
        if(isset($_SESSION['user_id']) and isset($_SESSION['user_role_admin']) == 'ROLE_ADMIN') {
            return true;
        }
        return false;
    }


    private function saveSession($id)
    {
        $_SESSION['user_id'] = $id;
    }

    private function saveSessionAdmin($id, $role)
    {
        $_SESSION['user_id'] = $id;
        $_SESSION['user_role_admin'] = $role;
    }
}