<?php

namespace App\Repository;

use App\Entity\GoGoWork;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GoGoWork|null find($id, $lockMode = null, $lockVersion = null)
 * @method GoGoWork|null findOneBy(array $criteria, array $orderBy = null)
 * @method GoGoWork[]    findAll()
 * @method GoGoWork[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GoGoWorkRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GoGoWork::class);
    }

    // /**
    //  * @return GoGoWork[] Returns an array of GoGoWork objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GoGoWork
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
