<?php

namespace App\Model;

use Core\Config\BaseRepository;

class TranslationsRepository extends BaseRepository
{
    public function findTranslation(string $name): array
    {
        $queryBuilder = $this->entityRepository->createQueryBuilder('t');

        return $queryBuilder->select('t')
            ->where($queryBuilder->expr()->orX(
                $queryBuilder->expr()->like('t.name', ':name'),
                $queryBuilder->expr()->like('t.fr', ':name'),
                $queryBuilder->expr()->like('t.en', ':name')
            ))
            ->setMaxResults(5)
            ->setParameter('name', '%'.$name.'%')
            ->getQuery()
            ->getResult();
    }

}
