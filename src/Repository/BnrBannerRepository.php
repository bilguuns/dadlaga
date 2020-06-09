<?php

namespace App\Repository;

use App\Entity\BnrBanner;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BnrBanner|null find($id, $lockMode = null, $lockVersion = null)
 * @method BnrBanner|null findOneBy(array $criteria, array $orderBy = null)
 * @method BnrBanner[]    findAll()
 * @method BnrBanner[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BnrBannerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BnrBanner::class);
    }

    // /**
    //  * @return BnrBanner[] Returns an array of BnrBanner objects
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
    public function findOneBySomeField($value): ?BnrBanner
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
