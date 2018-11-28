<?php

namespace App\Repository;

use App\Entity\PtitDej;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PtitDej|null find($id, $lockMode = null, $lockVersion = null)
 * @method PtitDej|null findOneBy(array $criteria, array $orderBy = null)
 * @method PtitDej[]    findAll()
 * @method PtitDej[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PtitDejRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PtitDej::class);
    }

    // /**
    //  * @return PtitDej[] Returns an array of PtitDej objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PtitDej
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
