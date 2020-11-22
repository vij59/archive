<?php

namespace App\Repository;

use App\Entity\Firm;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Firm|null find($id, $lockMode = null, $lockVersion = null)
 * @method Firm|null findOneBy(array $criteria, array $orderBy = null)
 * @method Firm[]    findAll()
 * @method Firm[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FirmRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Firm::class);
    }

    public function findSnapshotByDate(Firm $firm, DateTime $date)
    {
        return $this->createQueryBuilder('f')
          ->innerJoin('f.snapshots', 'snapshot' , Join::WITH, 'snapshot.modificationDateTime <=
          :date'  )
            ->andWhere('f.id = :firmId')
            ->setParameters(['date' => $date, 'firmId' => $firm->getId()])
            ->setMaxResults(1)
            ->orderBy('snapshot.modificationDateTime', 'DESC')
            ->getQuery()
            ->getOneOrNullResult()
            ;
    }

    // /**
    //  * @return Firm[] Returns an array of Firm objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Firm
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
