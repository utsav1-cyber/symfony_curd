<?php

namespace App\Repository;

use App\Entity\OrangeChef;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OrangeChef|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrangeChef|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrangeChef[]    findAll()
 * @method OrangeChef[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrangeChefRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OrangeChef::class);
    }

    // /**
    //  * @return OrangeChef[] Returns an array of OrangeChef objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OrangeChef
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
