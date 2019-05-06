<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


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
 * La classe Panier n'a pas de propriétés.
 * $panier est stocké directement en $_SESSION
 *
 * Cette classe sert seulement à appeler des fonctions utilitaires
 * 
 */


class Panier
{
    /*
     * Calcul du total du $panier
     */
    public function totalPanier()
    {
        $session = $this->getRequest()->getSession();
        $panier = $session->get('panier', array());
    }

    /*
     * Calcul du nombre d'Article dans le $panier
     */
    public function countArticle()
    {
        $session = $this->getRequest()->getSession();
        $panier = $session->get('panier', array());
    }

}
