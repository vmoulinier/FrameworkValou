<?php

namespace Core\Services;

class Twig
{

    public function logged(): bool
    {
        if(isset($_SESSION['user_id'])) {
            return true;
        }
        return false;
    }

    public function loggedAdmin(): bool
    {
        if(isset($_SESSION['user_id']) && isset($_SESSION['user_role_admin'])) {
            if($_SESSION['user_role_admin'] == 'ROLE_ADMIN') {
                return true;
            }
        }
        return false;
    }

    public function isMobile() {
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }

}