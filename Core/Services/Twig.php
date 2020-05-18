<?php

namespace Core\Services;

use Core\Config;

class Twig extends Config
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
            if($_SESSION['user_role_admin'] === 'ROLE_ADMIN') {
                return true;
            }
        }
        return false;
    }

    public function translation($name, $params = [])
    {
        $translation = $this->entityManager->getRepository('App\Entity\Translations')->findOneBy(['name' => $name]);
        if ($translation) {
            $method = 'get' . ucfirst(DEFAULT_LANGAGE);
            if (method_exists($translation, $method)) {
                $str = $translation->$method();
                foreach ($params as $key => $param) {
                    $str = str_replace('%'.$key.'%', $param, $str);
                }
                return $str;
            }
        }
        $str = ' ';
        foreach ($params as $key => $param) {
            $str .= '%' . $key . '% ';
        }
        return $name . $str;
    }

    public function isMobile() {
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
    }

}
