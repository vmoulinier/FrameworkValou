<?php

namespace App\Model;

use App\Entity\Translations;

class TranslationsRepository extends Repository
{
    public function updateTranslation(int $id, string $name, string $fr, string $en): void
    {
        $translation = $this->find($id);
        $translation->setName(trim($name));
        $translation->setFr($fr);
        $translation->setEn($en);
        $this->entityManager->getDoctrine()->flush();
    }

    public function removeTranslation(int $id): void
    {
        $translation = $this->find($id);
        $this->entityManager->getDoctrine()->remove($translation);
        $this->entityManager->getDoctrine()->flush();
    }

    public function addTranslation(string $name, string $fr, string $en): void
    {
        $translation = $this->findBy(['name' => $name]);
        if(!$translation) {
            $translation = new Translations();
            $translation->setName(trim($name));
            $translation->setFr($fr);
            $translation->setEn($en);
            $this->entityManager->getDoctrine()->persist($translation);
            $this->entityManager->getDoctrine()->flush();
        }
    }

    public function findTranslation(string $name): array
    {
        $queryBuilder = $this->entityRepository->createQueryBuilder('t');

        return $queryBuilder->select('t')
            ->where($queryBuilder->expr()->orX(
                $queryBuilder->expr()->eq('t.name', ':name'),
                $queryBuilder->expr()->eq('t.fr', ':name'),
                $queryBuilder->expr()->eq('t.en', ':name')
            ))
            ->setParameter('name', $name)
            ->getQuery()
            ->getResult();
    }

}
