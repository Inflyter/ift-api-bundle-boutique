<?php

namespace App\Inflyter\BoutiqueBundle\Repository\Shop;

use App\Inflyter\BoutiqueBundle\Entity\Shop\BoutiqueElement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BoutiqueElement|null find($id, $lockMode = null, $lockVersion = null)
 * @method BoutiqueElement|null findOneBy(array $criteria, array $orderBy = null)
 * @method BoutiqueElement[]    findAll()
 * @method BoutiqueElement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BoutiqueElementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BoutiqueElement::class);
    }

    // /**
    //  * @return BoutiqueElement[] Returns an array of BoutiqueElement objects
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
    public function findOneBySomeField($value): ?BoutiqueElement
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
