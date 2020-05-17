<?php

namespace App\Model;

use Core\Services\Services;

class Repository
{
    protected $entityManager;

    protected $entityRepository;

    public function __construct()
    {
        $currentClass = explode('\\', get_class($this));
        $currentClass = str_replace('Repository', '', $currentClass[2]);
        $this->entityManager = new Services();
        class_exists('App\Entity\\'.$currentClass) ? $this->entityRepository = $this->entityManager->getDoctrine()->getRepository('App\Entity\\'.$currentClass) : $this->entityRepository = null;
    }

    public function find($id, $lockMode = null, $lockVersion = null)
    {
        return $this->entityRepository->find($id, $lockMode, $lockVersion);
    }

    public function findAll()
    {
        return $this->entityRepository->findAll();
    }

    public function findOneBy(array $criteria, array $orderBy = null)
    {
        return $this->entityRepository->findOneBy($criteria, $orderBy);
    }

    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        return $this->entityRepository->findBy($criteria, $orderBy, $limit, $offset);
    }
}