<?php

namespace Core\Services;

use App\Model\Repository;
use App\Services\Service;
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

    public function getService($name): Service
    {
        if(class_exists('\App\Services\\' . ucfirst($name) . 'Service')) {
            $service = '\App\Services\\' . ucfirst($name) . 'Service';
            return new $service($this);
        }

        throw new \Error('Service not found');
    }

    public function getEntityManager(): EntityManager
    {
        return $this->entityManager;
    }
}
