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
    public function updateTranslation()
    {
        $translation = new Translations();
        $translation->setId($_POST['id']);
        $translation->setNom($_POST['nom']);
        $translation->setFr($_POST['fr']);
        $translation->setEn($_POST['en']);
        $this->entityManager->getDoctrine()->merge($translation);
        $this->entityManager->getDoctrine()->flush();
    }

}