<?php

namespace Kosipov\Iro1435\Repositories;

class UserRepository extends \Doctrine\ORM\EntityRepository
{
    public function findFirstIvan()
    {
        $ivanName = '%Ivan%';
        $queryBuilder = $this->createQueryBuilder('users');
        $queryBuilder
            ->where("users.name like :ivanName")
            ->setParameter('ivanName', $ivanName)
            ->orderBy('users.id', 'ASC');
        $query = $queryBuilder->getQuery();

        return $query->setMaxResults(1)->getOneOrNullResult();
    }

    public function findFirstIvanByRaw()
    {
        $sql = "
        SELECT * FROM users u
        WHERE u.name like '%Ivan%'
        ORDER BY u.name ASC
        LIMIT 1
        ";

        $statement = $this->getEntityManager()->getConnection()->prepare($sql);

        return $statement->executeQuery()->fetchAllAssociative();
    }
}