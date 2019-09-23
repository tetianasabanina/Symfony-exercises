<?php

namespace App\Repository;

use App\Entity\Linkki;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Linkki|null find($id, $lockMode = null, $lockVersion = null)
 * @method Linkki|null findOneBy(array $criteria, array $orderBy = null)
 * @method Linkki[]    findAll()
 * @method Linkki[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LinkkiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Linkki::class);
    }

    // /**
    //  * @return Linkki[] Returns an array of Linkki objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Linkki
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
