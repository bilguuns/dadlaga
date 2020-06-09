<?php

namespace App\Repository;

use App\Entity\BnrPosition;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BnrPosition|null find($id, $lockMode = null, $lockVersion = null)
 * @method BnrPosition|null findOneBy(array $criteria, array $orderBy = null)
 * @method BnrPosition[]    findAll()
 * @method BnrPosition[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BnrPositionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BnrPosition::class);
    }

    // /**
    //  * @return BnrPosition[] Returns an array of BnrPosition objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BnrPosition
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
