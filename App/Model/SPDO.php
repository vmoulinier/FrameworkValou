<?php

namespace App\Model;

class SPDO
{

    private $PDOInstance = null;

    private static $instance = null;

    const DEFAULT_SQL_USER = 'root';

    const DEFAULT_SQL_HOST = 'localhost';

    const DEFAULT_SQL_PASS = '';

    const DEFAULT_SQL_DTB = 'projetsecu';

    private function __construct()
    {
        $this->PDOInstance = new \PDO('mysql:dbname='.self::DEFAULT_SQL_DTB.';host='.self::DEFAULT_SQL_HOST,self::DEFAULT_SQL_USER ,self::DEFAULT_SQL_PASS);
        $this->PDOInstance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
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