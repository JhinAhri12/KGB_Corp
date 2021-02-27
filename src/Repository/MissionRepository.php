<?php

namespace App\Repository;

use App\Entity\Mission;
use App\Entity\Agent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Mission|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mission|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mission[]    findAll()
 * @method Mission[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MissionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Mission::class);
    }

    public function getInformationMissionsDQL(): array
   {
       return $this->getEntityManager()->createQuery(
           'SELECT m,a,c,ct   FROM App\Entity\Mission m
           JOIN m.idAgent a
           JOIN m.idCible c
           JOIN m.idContact ct'
       )
           ->getResult();
   }

   public function getInformationMissionsParamDQL(int $id): array
  {
      return $this->getEntityManager()->createQuery(
          'SELECT m,a,c,ct   FROM App\Entity\Mission m
          JOIN m.idAgent a
          JOIN m.idCible c
          JOIN m.idContact ct
          where m.id = :id'
      )->setParameter('id', $id)
      ->getResult();
  }

    // /**
    //  * @return Mission[] Returns an array of Mission objects
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
    public function findOneBySomeField($value): ?Mission
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
