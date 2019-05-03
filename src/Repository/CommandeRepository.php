<?php

namespace App\Repository;

use App\Entity\Commande;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/*
 * --------------------------------------------------------
 * GENERALITES
 * --------------------------------------------------------
 *
 * Requêtes bdd
 *
*/

/**
 * @method Commande|null find($id, $lockMode = null, $lockVersion = null)
 * @method Commande|null findOneBy(array $criteria, array $orderBy = null)
 * @method Commande[]    findAll()
 * @method Commande[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommandeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Commande::class);
    }


    /**
     *
     * @return Commande[] Returns an array of Commande objects
     */
    public function findByMembre($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.membre = :val')
            ->setParameter('val', $value)
            ->orderBy('c.date_commande', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    /*
     * Récupère les 5 Commande les plus récentes de la BDD
     */
    public function findOneById($value): ?Commande
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    /*
     * Récupère les 5 Commande les plus récentes de la BDD
     */
    public function findByLatest()
    {
        return $this->createQueryBuilder('a')
            ->orderBy('a.date_commande','DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult()
            ;
    }

}
