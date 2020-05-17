<?php

namespace Core;

use Mailjet\Client;

class Config
{
    protected $mailjet;

    protected $entityManager;

    protected $file;

    protected $helper;

    protected $fb;

    /**
     * Config constructor.
     */
    public function __construct()
    {
        //mailjet
        $this->mailjet = new Client(MJ_APIKEY_PUBLIC, MJ_APIKEY_PRIVATE, true,['version' => 'v3.1']);

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

        //facebook
        $fb = new \Facebook\Facebook([
            'app_id' => FACEBOOK_APIKEY,
            'app_secret' => FACEBOOK_API_SECRET,
            'default_graph_version' => 'v2.10',
            //'default_access_token' => '{access-token}', // optional
        ]);
        $this->helper = $fb->getRedirectLoginHelper();
        $this->fb = $fb;
    }

}
