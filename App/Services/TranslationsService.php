<?php

namespace App\Services;

use App\Entity\Translations;
use Core\Services\Services;

class TranslationsService extends Services
{
    public function updateTranslation(int $id, string $name, string $fr, string $en): void
    {
        $translation = $this->getRepository('translations')->find($id);
        $translation->setName(trim($name));
        $translation->setFr($fr);
        $translation->setEn($en);
        $this->entityManager->persist($translation);
        $this->entityManager->flush();
    }

    public function removeTranslation(int $id): void
    {
        $translation = $this->getRepository('translations')->find($id);
        $this->entityManager->remove($translation);
        $this->entityManager->flush();
    }

    public function addTranslation(string $name, string $fr, string $en): void
    {
        $translation = $this->getRepository('translations')->findBy(['name' => $name]);
        if(!$translation) {
            $translation = new Translations();
            $translation->setName(trim($name));
            $translation->setFr($fr);
            $translation->setEn($en);
            $this->entityManager->persist($translation);
            $this->entityManager->flush();
        }
    }
}
