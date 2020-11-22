<?php

namespace App\Repository;

use App\Entity\Firm;
use App\Entity\Snapshot;
use DateTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Snapshot|null find($id, $lockMode = null, $lockVersion = null)
 * @method Snapshot|null findOneBy(array $criteria, array $orderBy = null)
 * @method Snapshot[]    findAll()
 * @method Snapshot[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SnapshotRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Snapshot::class);
    }

    public function findSnapshotByDate(Firm $firm, DateTime $date)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.modificationDateTime <= :date')
            ->andWhere('s.firm = :firm')
            ->setParameters(['date' => $date, 'firm' => $firm])
            ->setMaxResults(1)
            ->orderBy('s.modificationDateTime', 'DESC')
            ->getQuery()
            ->getOneOrNullResult()
            ;
    }
    // /**
    //  * @return Snapshot[] Returns an array of Snapshot objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Snapshot
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
