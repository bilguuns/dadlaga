<?php

namespace App\Repository;

use App\Entity\BnrCompany;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BnrCompany|null find($id, $lockMode = null, $lockVersion = null)
 * @method BnrCompany|null findOneBy(array $criteria, array $orderBy = null)
 * @method BnrCompany[]    findAll()
 * @method BnrCompany[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BnrCompanyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BnrCompany::class);
    }

    // /**
    //  * @return BnrCompany[] Returns an array of BnrCompany objects
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
    public function findOneBySomeField($value): ?BnrCompany
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
