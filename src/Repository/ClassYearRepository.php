<?php

namespace App\Repository;

use App\Entity\ClassYear;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ClassYear|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClassYear|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClassYear[]    findAll()
 * @method ClassYear[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClassYearRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ClassYear::class);
    }

    // /**
    //  * @return ClassYear[] Returns an array of ClassYear objects
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
    public function findOneBySomeField($value): ?ClassYear
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
