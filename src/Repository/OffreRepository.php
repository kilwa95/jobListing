<?php

namespace App\Repository;

use App\Entity\Offre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;


/**
 * @method Offre|null find($id, $lockMode = null, $lockVersion = null)
 * @method Offre|null findOneBy(array $criteria, array $orderBy = null)
 * @method Offre[]    findAll()
 * @method Offre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OffreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Offre::class);
    }

     /**
     * @return offre[] Returns an array of Candidat objects
     */

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

    public function searcheOffre($resultats)
    {
        return $this->createQueryBuilder('o')
            ->leftJoin('o.category','category')
            ->Where('category.nom = :categoryNom')
            ->setParameter('categoryNom',$resultats->getCategory()->getNom())
            ->andWhere('o.nom_entreprise=:nomEntreprise')
            ->setParameter('nomEntreprise',$resultats->getNomEntreprise())
            ->leftJoin('o.type_emploi','typeEmploi')
            ->andWhere('typeEmploi.nom = :typeEmploiName')
            ->setParameter('typeEmploiName',$resultats->getTypeEmploi()->getNom())
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
            ;
    }

    public function findBycategory($id)
    {
        return $this->createQueryBuilder('o')
            ->leftJoin('o.category','category')
            ->andWhere('category.id= :id')
            ->setParameter('id',$id)
            ->getQuery()
            ->getResult()
            ;
    }


    /**public function findSmallEntreprise(): ?Offre
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.lieu = :paris')
            ->getQuery()
            ->getResult()
        ;
    }
**/


}

