<?php

namespace App\Model;

class SPDO
{

    private $PDOInstance = null;

    private static $instance = null;

    const DEFAULT_SQL_HOST = 'localhost';


    private function __construct()
    {
        $this->PDOInstance = new \PDO('mysql:dbname='.DB_NAME.';host='.self::DEFAULT_SQL_HOST,DB_USER ,DB_PASS);
        $this->PDOInstance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $this->PDOInstance->exec("SET NAMES 'utf8';");
    }

    public static function getInstance()
    {
        if(is_null(self::$instance))
        {
            self::$instance = new SPDO();
        }
        return self::$instance;
    }

    public function query($query)
    {
        return $this->PDOInstance->query($query);
    }

    public function prepare($query)
    {
        return $this->PDOInstance->prepare($query);
    }

    public function lastInsertId()
    {
        return $this->PDOInstance->lastInsertId();
    }
}
