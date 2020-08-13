<?php

namespace App\Services;

use App\Entity\Translations;

class TranslationsService extends Service
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
