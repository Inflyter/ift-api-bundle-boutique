<?php

namespace App\Inflyter\BoutiqueBundle\Repository\Shop;

use App\Inflyter\BoutiqueBundle\Entity\Shop\BoutiqueElementAssets;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BoutiqueElementAssets|null find($id, $lockMode = null, $lockVersion = null)
 * @method BoutiqueElementAssets|null findOneBy(array $criteria, array $orderBy = null)
 * @method BoutiqueElementAssets[]    findAll()
 * @method BoutiqueElementAssets[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BoutiqueElementAssetsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BoutiqueElementAssets::class);
    }

    // /**
    //  * @return BoutiqueElementAssets[] Returns an array of BoutiqueElementAssets objects
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
    public function findOneBySomeField($value): ?BoutiqueElementAssets
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
