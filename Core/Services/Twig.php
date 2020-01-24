<?php

namespace Core\Services;

class Twig
{

    public function logged() {
        if(isset($_SESSION['user_id'])) {
            return true;
        }
        return false;
    }

    public function loggedAdmin() {
        if(isset($_SESSION['user_id']) && isset($_SESSION['user_role_admin'])) {
            if($_SESSION['user_role_admin'] == 'ROLE_ADMIN') {
                return true;
            }
        }
        return false;
    }

}