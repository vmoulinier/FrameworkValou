<?php

namespace App\Model;

use App\Entity\Translations;
use Core\Services\Services;

class TranslationsRepository
{

    protected $entityManager;

    /**
     * UserRepository constructor.
     */
    public function __construct()
    {
        $this->entityManager = new Services();
    }

    public function updateTranslation(): void
    {
        $translation = $this->entityManager->getDoctrine()->getRepository('App\Entity\Translations')->find($_POST['id']);
        $translation->setName($_POST['name']);
        $translation->setFr($_POST['fr']);
        $translation->setEn($_POST['en']);
        $this->entityManager->getDoctrine()->flush();
    }

    public function removeTranslation(): void
    {
        $translation = $this->entityManager->getDoctrine()->getRepository('App\Entity\Translations')->find($_POST['id_delete']);
        $this->entityManager->getDoctrine()->remove($translation);
        $this->entityManager->getDoctrine()->flush();
    }

    public function addTranslation(): void
    {
        $translation = $this->entityManager->getDoctrine()->getRepository('App\Entity\Translations')->findBy(['name' => $_POST['name']]);
        if(!$translation) {
            $translation = new Translations();
            $translation->setName(trim($_POST['name']));
            $translation->setFr($_POST['fr']);
            $translation->setEn($_POST['en']);
            $this->entityManager->getDoctrine()->persist($translation);
            $this->entityManager->getDoctrine()->flush();
        }
    }

    public function findTranslation(string $name): array
    {
        $query = 'SELECT * FROM translations WHERE name LIKE :name OR fr LIKE :name OR en LIKE :name LIMIT 5';
        $req = SPDO::getInstance()->prepare($query);
        $req->execute([':name' => '%'.$name.'%']);
        return $req->fetchAll(\PDO::FETCH_OBJ);
    }

}