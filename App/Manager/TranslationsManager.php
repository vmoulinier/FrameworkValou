<?php

namespace App\Manager;

use Core\Config\BaseServices;
use App\Entity\Translations;

class TranslationsManager extends BaseServices
{
    public function updateTranslation(int $id, string $name, string $fr, string $en): void
    {
        $translation = $this->getRepository('translations')->find($id);
        $translation->setName(trim($name));
        $translation->setFr($fr);
        $translation->setEn($en);
        $this->getEntityManager()->persist($translation);
        $this->getEntityManager()->flush();
    }

    public function removeTranslation(int $id): void
    {
        $translation = $this->getRepository('translations')->find($id);
        $this->getEntityManager()->remove($translation);
        $this->getEntityManager()->flush();
    }

    public function addTranslation(string $name, string $fr, string $en): void
    {
        $translation = $this->getRepository('translations')->findBy(['name' => $name]);
        if(!$translation) {
            $translation = new Translations();
            $translation->setName(trim($name));
            $translation->setFr($fr);
            $translation->setEn($en);
            $this->getEntityManager()->persist($translation);
            $this->getEntityManager()->flush();
        }
    }
}
