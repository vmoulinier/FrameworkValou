<?php

namespace Core\Controller;
require_once "vendor/autoload.php";


class DoctrineORM
{

    protected $entityManager;

    /**
     * Controller constructor.
     */
    public function __construct(){
        $entityPath = array("App/Entity");
        $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration($entityPath, true);
        $databaseParams = array(
            'driver'   => 'pdo_mysql',
            'user'     => 'root',
            'password' => '',
            'dbname'   => 'mytek',
        );
        $this->entityManager = \Doctrine\ORM\EntityManager::create($databaseParams, $config);
    }

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }

}

