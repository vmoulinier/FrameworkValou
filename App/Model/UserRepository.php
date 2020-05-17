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

    public function register(string $email, string $password, string $password_verif, string $name, string $firstname, string $facebook = null): array
    {
        $users = $this->entityManager->getDoctrine()->getRepository('App\Entity\User')->findOneBy(['email' => $email]);
        $error = [];

        if(!$users) {
            if($password === $password_verif) {
                $password = sha1($password);
                $user = new User();
                $user->setName($name);
                $user->setFirstName($firstname);
                $user->setEmail($email);
                $user->setPassword($password);
                $user->setFacebookId($facebook);
                if (ENV === 'dev') {
                    $user->setType('ROLE_ADMIN');
                }
                $this->entityManager->getDoctrine()->persist($user);
                $this->entityManager->getDoctrine()->flush();
                $error[0] = "account.register.success";
                $error[1] = "success";
                $error[2] = true;
            } else {
                $error[0] = "account.register.diff.pass";
                $error[1] = "danger";
                $error[2] = false;
            }
        } else {
            $error[0] = "account.register.mail.exist";
            $error[1] = "danger";
            $error[2] = false;
        }
        return $error;
    }

    public function login(string $email, string $password): bool
    {
        $user = $this->entityManager->getDoctrine()->getRepository('App\Entity\User')->findOneBy(['email' =>$email, 'password' =>sha1($password)]);
        if($user) {
            if($user->getType() === 'ROLE_ADMIN'){
                $this->saveSessionAdmin($user->getId(), $user->getType());
                return true;
            }
            $this->saveSession($user->getId());
            return true;
        }
        return false;
    }

    public function loginfb(string $email, string $facebookId): bool
    {
        $user = $this->entityManager->getDoctrine()->getRepository('App\Entity\User')->findOneBy(['email' =>$email, 'facebook_id' => $facebookId]);
        if($user) {
            if($user->getType() === 'ROLE_ADMIN'){
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
        if(isset($_SESSION['user_id']) and isset($_SESSION['user_role_admin']) === 'ROLE_ADMIN') {
            return true;
        }
        return false;
    }


    private function saveSession(int $id)
    {
        $_SESSION['user_id'] = $id;
    }

    private function saveSessionAdmin(int $id, string $role)
    {
        $_SESSION['user_id'] = $id;
        $_SESSION['user_role_admin'] = $role;
    }
}