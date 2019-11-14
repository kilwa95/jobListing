<?php

namespace App\Repository;

use App\Entity\TypeEmploie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TypeEmploie|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeEmploie|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeEmploie[]    findAll()
 * @method TypeEmploie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeEmploieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeEmploie::class);
    }

    // /**
    //  * @return TypeEmploie[] Returns an array of TypeEmploie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeEmploie
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
