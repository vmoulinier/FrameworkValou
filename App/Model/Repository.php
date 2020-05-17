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
        $currentClass ? $this->entityRepository = $this->entityManager->getDoctrine()->getRepository('App\Entity\\'.$currentClass) : $this->entityRepository = null;
    }

    public function hydrate($strobject, array $data)
    {
        $strobject =  '\App\Entity\\'.ucfirst($strobject);
        if(class_exists($strobject)){
            $object = new $strobject();
            foreach ($data as $key => $value) {
                $method = 'set' . ucfirst($key);
                if (method_exists($object, $method)) {
                    $object->$method($value);
                }
            }
            return $object;
        }
        return false;
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