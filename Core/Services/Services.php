<?php

namespace Core\Services;

use Core\Config\Repository;
use Core\Config\BaseServices;
use Core\Config\Config;
use Doctrine\ORM\EntityManager;

require_once 'Core/Config/Config.php';

class Services extends Config
{
    public function getRepository($entity): Repository
    {
        if(class_exists('\App\Model\\' . ucfirst($entity) . 'Repository')) {
            $repository = '\App\Model\\' . ucfirst($entity) . 'Repository';
            return new $repository($this);
        }

        throw new \Error('repository not found');
    }

    public function getService($name): BaseServices
    {
        if(class_exists('\App\Services\\' . ucfirst($name) . 'Service')) {
            $service = '\App\Services\\' . ucfirst($name) . 'Service';
            return new $service($this);
        }

        throw new \Error('Service not found');
    }

    public function getManager($name): BaseServices
    {
        if(class_exists('\App\Manager\\' . ucfirst($name) . 'Manager')) {
            $manager = '\App\Manager\\' . ucfirst($name) . 'Manager';
            return new $manager($this);
        }

        throw new \Error('Manager not found');
    }

    public function getEntityManager(): EntityManager
    {
        return $this->entityManager;
    }
}
