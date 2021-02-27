<?php

namespace App\Repository;

use App\Entity\Specialite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Specialite|null find($id, $lockMode = null, $lockVersion = null)
 * @method Specialite|null findOneBy(array $criteria, array $orderBy = null)
 * @method Specialite[]    findAll()
 * @method Specialite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpecialiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Specialite::class);
    }

    public function createSpecialiteDQL(string $description):array
   {
     $conn = $this->getEntityManager()->getConnection();

      $sql = '
        INSERT INTO specialite (description) values (:description)
            ';
      $stmt = $conn->prepare($sql);
      $stmt->execute(['description' => $description]);

      return $stmt->fetchAllAssociative();
   }

   public function showSpecialiteDQL():array
  {
    $conn = $this->getEntityManager()->getConnection();

     $sql = '
        Select * From specialite';
     $stmt = $conn->prepare($sql);
     $stmt->execute();

     return $stmt->fetchAllAssociative();
  }

    // /**
    //  * @return Specialite[] Returns an array of Specialite objects
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
    public function findOneBySomeField($value): ?Specialite
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
