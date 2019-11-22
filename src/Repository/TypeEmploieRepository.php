<?php


namespace App\Repository;


use App\Entity\TypeEmploi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TypeEmploi|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeEmploi|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeEmploi[]    findAll()
 * @method TypeEmploi[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */


class TypeEmploieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeEmploi::class);
    }
}