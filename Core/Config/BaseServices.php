<?php

namespace Core\Config;

use Core\Config\BaseRepository;
use Core\Services\Services;
use Doctrine\ORM\EntityManager;

class BaseServices
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

    public function getService(string $name): BaseServices
    {
        return $this->services->getService($name);
    }

    public function getManager(string $name): BaseServices
    {
        return $this->services->getManager($name);
    }

    public function getRepository(string $entity): BaseRepository
    {
        return $this->services->getRepository($entity);
    }
}
