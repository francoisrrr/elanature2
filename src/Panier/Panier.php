<?php

namespace App\Panier;

use App\Entity\Article;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/*
 * --------------------------------------------------------
 * REFERENCES
 * --------------------------------------------------------
 *
 * http://www.expreg.com/expreg_article.php?art=caddie
 *
 */

/*
 * --------------------------------------------------------
 * DESCRIPTION
 * --------------------------------------------------------
 * 
 * Cette classe ne correspond pas à une table en BDD. Elle n'est
 * pas prise en compte par l'ORM.
 *
 * La classe Panier n'a pas de propriétés mais elle contient les 
 * fonctions appellées par la classe PanierController
 * $panier est stocké directement en $_SESSION
 *
 */

class Panier
{
    private $session, $manager;

    /**
     * -OK- Constructeur
     * Panier constructor.
     * @param $session
     * @param $manager
     *
     * La classe Panier n'hérite pas de Controller
     * Ce constructeur permet d'accéder à la $session et aux Entity
     */
    public function __construct(SessionInterface $session, ObjectManager $manager)
    {
        $this->session = $session;
        $this->manager = $manager;
    }

    //  -OK- Récupère le $panier en $_SESSION
    public function getPanier()
    {
        return $this->session->get('panier');
    }

    //  -OK- Suppression du panier en $_SESSION
    public function deletePanier()
    {
        $this->session->remove('panier');
    }

    //  -OK- Ajoute ($quantity x $article) dans l'array $panier passé en argument
    public function pushPanier(Article $article, $quantity, $panier)
    {
        // Initialisation de $quantity
        $article->setQuantity($quantity);

        // Ajout de $article dans $panier
        $panier[] = $article;

        return $panier;
    }

    //  -OK- Ajoute ($quantity x Article) dans $panier en $_SESSION
    public function addArticle(Article $article, $quantity)
    {
        $panier = $this->session->get('panier');
        $flag = false;

        // -- Si $panier n'est pas vide
        if (!empty($panier)) {
            // -- Si $article existe dans le $panier
            foreach ($panier as $key => $item) {
                if ($item->getId() == $article->getId()) {
                    if ($quantity != 0 && ($item->getQuantity() + $quantity) > 0) {
                        // Incrémentation de $quantity dans le $panier
                        $item->setQuantity($item->getQuantity() + $quantity);
                        $flag=true;
                        break;
                    } elseif ($quantity = 0 || ($item->getQuantity() + $quantity) <= 0) {
                        // Suppression de $item du $panier
                        unset($panier[$key]);
                        $flag=true;
                        break;
                    }
                }
            }

            // -- Si $article n'existe pas dans le $panier
            if ($quantity > 0 && $flag==false) {
                $panier = $this->pushPanier($article,$quantity,$panier);
            }

        } else {
            // -- Si $panier est vide
            if ($quantity > 0) {
                $panier = $this->pushPanier($article,$quantity,$panier);
            }
        }

        // -- Ecriture du $panier en $_SESSION
        $this->session->set('panier', $panier);
    }

    //  -- Calcul du total du $panier
    public function totalPanier()
    {
        $panier = $this->session->get('panier', array());
        $total = 0;

        foreach ($panier as $item) {
            $total += $item->getPrix() * $item->getQuantity();
        }

        return $total;
    }

    //  -OK- Comptage du nombre d'Article dans le $panier
    public function countPanier()
    {
        $panier = $this->session->get('panier', array());
        $count = 0;

        foreach ($panier as $item) {
            $count += $item->getQuantity();
        }

        return $count;
    }

}
    