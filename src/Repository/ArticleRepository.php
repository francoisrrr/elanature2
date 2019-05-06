<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Article::class);
    }

    /**
     * Recuperer les articles du spotlight
     * Uniquement les 5 derniers
     * Trier par ordre decroissant
     */

    public function findByPromotion()
    {
        # SELECT * FROM article as a
        #   WHERE a.promotion = 1
        return $this->createQueryBuilder('a')
            ->where('a.promotion = 1')
            ->orderBy('a.id', 'DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult()
            ;
    }


    /**
     * Recuperer les articles a la special
     * Uniquement les 5 derniers
     * Trier par ordre decroissant
     */


    public function findByCoupDeCoeur()
    {
        # SELECT * FROM article as a
        #   WHERE a.coupdecoeur = 1
        return $this->createQueryBuilder('a')
            ->where('a.coupdecoeur = 1')
            ->orderBy('a.id', 'DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * Recuperer les 5 derniers articles de la BDD
     */

    public function findByNouveaute()
    {
        # SELECT * FROM article as a
        return $this->createQueryBuilder('a')

            ->orderBy('a.id', 'DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult()
            ;
    }


    // /**
    //  * @return Article[] Returns an array of Article objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Article
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
