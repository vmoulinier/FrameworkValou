<?php
/**
 * Created by PhpStorm.
 * User: vmoul
 * Date: 08/03/2017
 * Time: 23:06
 */

namespace App\Model;


use App\Entity\User;
use Core\Controller\DoctrineORM;

class UserRepository extends DoctrineORM
{
    public function register($email, $password, $password_verif, $nom, $prenom) {
        $users = $this->entityManager->getRepository('App\Entity\User')->findOneBy(array('email' => $email));
        if($users == null) {

            if($password === $password_verif) {
                $password = sha1($password);
                $user = new User();
                $user->setNom($nom);
                $user->setPrenom($prenom);
                $user->setEmail($email);
                $user->setPassword($password);
                $user->setGroupe(null);
                $this->entityManager->persist($user);
                $this->entityManager->flush();
                $error = "Compte enregistré !";
            } else {
                $error = "Vos mots de passes sont différents.";
            }
        } else {
            $error = "Email déjà existant";
        }
        return $error;
    }

    public function login($email, $password) {
        $user = $this->entityManager->getRepository('App\Entity\User')->findOneBy(array('email' =>$email, 'password' =>sha1($password)));
        if($user) {
            if($user->getType() == 'ROLE_ADMIN'){
                $this->saveSessionAdmin($user->getId(), $user->getType());
                return true;
            } else {
                $this->saveSession($user->getId());
                return true;
            }
        }
        return false;
    }

    public function saveSession($id) {
        $_SESSION['user_id'] = $id;
    }

    public function saveSessionAdmin($id, $role) {
        $_SESSION['user_id'] = $id;
        $_SESSION['user_role_admin'] = $role;
    }

    public function islogged(){
        if(isset($_SESSION['user_id'])) {
            return true;
        }
        return false;
    }

    public function isloggedAdmin(){
        if(isset($_SESSION['user_id']) and isset($_SESSION['user_role_admin']) == 'ROLE_ADMIN') {
            return true;
        }
        return false;
    }

    public static function logged() {
        if(isset($_SESSION['user_id'])) {
            return true;
        }
        return false;
    }

    public static function loggedAdmin() {
        if(isset($_SESSION['user_id']) and isset($_SESSION['user_role_admin']) == 'ROLE_ADMIN') {
            return true;
        }
        return false;
    }

    public static function getCurrentUser() {
        if(isset($_SESSION['user_id'])) {
            $id = $_SESSION['user_id'];
            $orm = new DoctrineORM();
            $user = $orm->getEntityManager()->getRepository('App\Entity\User')->find($id);
            return $user;
        } else {
            return false;
        }
    }

}