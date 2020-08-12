<?php

namespace Core\Config;

class Config
{

    protected $entityManager;

    /**
     * Config constructor.
     */
    public function __construct()
    {
        //doctrine
        $entityPath =  ["App/Entity"];
        $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration($entityPath, true);
        $databaseParams = [
            'driver'   => 'pdo_mysql',
            'user'     => DB_USER,
            'password' => DB_PASS,
            'dbname'   => DB_NAME,
            'charset'  => 'UTF8',
        ];
        $this->entityManager = \Doctrine\ORM\EntityManager::create($databaseParams, $config);
    }

}
