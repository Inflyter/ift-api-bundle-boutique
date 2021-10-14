<?php

namespace App\Inflyter\BoutiqueBundle\Repository\Shop;

use App\Inflyter\BoutiqueBundle\Entity\Shop\BoutiqueSection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BoutiqueSection|null find($id, $lockMode = null, $lockVersion = null)
 * @method BoutiqueSection|null findOneBy(array $criteria, array $orderBy = null)
 * @method BoutiqueSection[]    findAll()
 * @method BoutiqueSection[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BoutiqueSectionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BoutiqueSection::class);
    }

    // /**
    //  * @return BoutiqueSection[] Returns an array of BoutiqueSection objects
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
    public function findOneBySomeField($value): ?BoutiqueSection
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
