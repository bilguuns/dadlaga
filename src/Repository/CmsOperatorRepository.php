<?php

namespace App\Repository;

use App\Entity\CmsOperator;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CmsOperator|null find($id, $lockMode = null, $lockVersion = null)
 * @method CmsOperator|null findOneBy(array $criteria, array $orderBy = null)
 * @method CmsOperator[]    findAll()
 * @method CmsOperator[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CmsOperatorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CmsOperator::class);
    }

    // /**
    //  * @return CmsOperator[] Returns an array of CmsOperator objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CmsOperator
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
