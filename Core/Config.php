<?php


namespace Core;

use Mailjet\Client;

class Config
{
    protected $mailjet;

    protected $entityManager;

    /**
     * Config constructor.
     */
    public function __construct()
    {
        $this->mailjet = new Client(MJ_APIKEY_PUBLIC, MJ_APIKEY_PRIVATE, true,['version' => 'v3.1']);

        $entityPath =  ["App/Entity"];
        $config = \Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration($entityPath, true);
        $databaseParams = [
            'driver'   => 'pdo_mysql',
            'user'     => DB_USER,
            'password' => DB_PASS,
            'dbname'   => DB_NAME,
        ];
        $this->entityManager = \Doctrine\ORM\EntityManager::create($databaseParams, $config);
    }
}