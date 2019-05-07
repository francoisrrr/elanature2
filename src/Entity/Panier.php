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
 * Cette classe sert seulement à appeler des fonctions auxilliaires
 * 
 * 
 * Exemple de $panier
 *       $panier=[
 *         'id_article1'=>'3',
 *         'id_article2'=>'1'
 *       ];
 */


class Panier
{

    //  Calcul du nombre d'Article dans le $panier
     /* 
        NB) Cette fonction fait seulement appel aux données en $_SESSION
        Elle peut être intégrée directement dans le template Twig.
     */

    public function countArticle()
    {
        $session = $this->getRequest()->getSession();
        $panier = $session->get('panier', array());

        foreach ($panier as $quantite) {
            $count+=$quantite;
        }

        return $count;
    }

    //  Calcul du total du $panier
    
    public function totalPanier()
    {
        $session = $this->getRequest()->getSession();
        $panier = $session->get('panier', array());

        foreach ($panier as $id => $quantite) {
            // -- Récupération en BDD de l'Article correspondand à $id
            
            // -- Récupération de $prix

            // -- Incrémentation du total
            $total+= $quantite*$prix;

            return $total;
        }
    }

}
