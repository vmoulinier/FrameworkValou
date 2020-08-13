<?php

namespace App\Services;

use App\Model\Repository;
use Core\Services\Services;
use Doctrine\ORM\EntityManager;

class Service
{

    protected $services;

    /**
     * Service constructor.
     */
    public function __construct(Services $services)
    {
        $this->services = $services;
    }

    public function getEntityManager(): EntityManager
    {
        return $this->services->getEntityManager();
    }

    public function getService(string $name): Service
    {
        return $this->services->getService($name);
    }

    public function getRepository(string $entity): Repository
    {
        return $this->services->getRepository($entity);
    }
}
