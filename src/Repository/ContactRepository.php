<?php

namespace App\Repository;

use App\Entity\Contact;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Contact|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contact|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contact[]    findAll()
 * @method Contact[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Contact::class);
    }

    public function createContactDQL(string $nom, string $prenom, string $date_de_naissance, string $nom_de_code, string $nationalite)
   {
     $conn = $this->getEntityManager()->getConnection();
      $sql = '
        INSERT INTO contact (nom,prenom,date_de_naissance,nom_de_code,nationalite) values (:nom,:prenom,:date_de_naissance,:nom_de_code,:nationalite)
            ';
      $stmt = $conn->prepare($sql);
      $stmt->execute(['nom' => $nom , 'prenom' => $prenom , 'date_de_naissance' => $date_de_naissance , 'nom_de_code' => $nom_de_code , 'nationalite' => $nationalite]);

      return $stmt->fetchAllAssociative();
   }

   public function showContactDQL():array
    {
      $conn = $this->getEntityManager()->getConnection();

       $sql = '
          Select * From contact';
       $stmt = $conn->prepare($sql);
       $stmt->execute();

       return $stmt->fetchAllAssociative();
    }

    // /**
    //  * @return Contact[] Returns an array of Contact objects
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
    public function findOneBySomeField($value): ?Contact
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
