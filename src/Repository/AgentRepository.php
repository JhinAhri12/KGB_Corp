<?php

namespace App\Repository;

use App\Entity\Agent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Agent|null find($id, $lockMode = null, $lockVersion = null)
 * @method Agent|null findOneBy(array $criteria, array $orderBy = null)
 * @method Agent[]    findAll()
 * @method Agent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AgentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Agent::class);
    }

    public function showAgentDQL():array
   {
     $conn = $this->getEntityManager()->getConnection();

      $sql = '
         Select * From Agent A INNER JOIN Specialite S On A.id_specialite = S.id
         ';
      $stmt = $conn->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAllAssociative();
   }

   public function createAgentDQL(string $nom, string $prenom, string $date_de_naissance, string $code_identification, string $nationalite,string $specialite)
  {
    $conn = $this->getEntityManager()->getConnection();
     $sql = '
       INSERT INTO agent (nom,prenom,date_de_naissance,code_identification,nationalite,id_specialite) values (:nom,:prenom,:date_de_naissance,:code_identification,:nationalite,:id_specialite)
           ';
     $stmt = $conn->prepare($sql);
     $stmt->execute(['nom' => $nom , 'prenom' => $prenom , 'date_de_naissance' => $date_de_naissance , 'code_identification' => $code_identification , 'nationalite' => $nationalite, 'id_specialite' => $specialite]);

     return $stmt->fetchAllAssociative();
  }

    // /**
    //  * @return Agent[] Returns an array of Agent objects
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
    public function findOneBySomeField($value): ?Agent
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
