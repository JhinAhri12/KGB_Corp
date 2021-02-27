<?php

namespace App\Repository;

use App\Entity\Cible;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Cible|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cible|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cible[]    findAll()
 * @method Cible[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CibleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cible::class);
    }

    // /**
    //  * @return Cible[] Returns an array of Cible objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Cible
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
