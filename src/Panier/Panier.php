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
    private $session, $manager, $articles = [];

    /**
     * -- Constructeur
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

    //  -- Récupère le $panier en $_SESSION
    public function getPanier()
    {
        return $this->session->get('panier');
    }

    //  -- Suppression du panier en $_SESSION
    public function deletePanier()
    {
        $this->session->remove('panier');
    }

    //  Ajoute un Article dans $panier en $_SESSION
    public function addArticle(Article $article, $quantity)
    {
        $panier = $this->session->get('panier');

        // -- Si $panier n'est pas vide
        if (!empty($panier)) {
            foreach ($panier as $item) {
                // -- Si $article existe dans le $panier
                if ($item->getId() == $article->getId()) {
                    $item->setQuantity($item->getQuantity() + $quantity);
                    break;
                }
            }
        } else {
            // -- Si $panier est vide
            $article->setQuantity(1);
            $panier[]=$article;
        }

        // -- Ecriture du $panier en $_SESSION
        $this->session->set('panier', $panier);
    }

    //  Calcul du total du $panier
    public function totalPanier()
    {
        $panier = $this->session->get('panier', array());
        $total = 0;

        foreach ($panier as $id => $quantite) {

            // -- Récupération en BDD de l'Article correspondand à $id


            // -- Récupération de $prix


            // -- Incrémentation du total

        }

        return $total;
    }



    //XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
    //XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
    //XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
    //XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
    //XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
    //XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
    //XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
    //XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
    //XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX

    //  XX Incrémente la $quantite de l'$id dans $panier en $_SESSION
    public function xx_addArticle($id)
    {
        // -- Si $panier est vide
        if (empty($this->session->get('panier'))) {
            $panier[$id]=1;
        } else {
            // -- Si $id existe déjà on ajoute 1
            $panier = $this->session->get('panier');
            if(array_key_exists($id,$panier)) {
                $panier[$id]++;
            } else {
                // -- Sinon on crée la clé dans $panier
                $panier[$id]=1;
            }
        }

        // -- Ecriture du $panier en $_SESSION
        $this->session->set('panier', $panier);
    }

    //  XX Décrémente la $quantite de l'$id dans $panier en $_SESSION
    public function xx_removeArticle($id)
    {
        if (!empty($this->session->get('panier'))) {
            $panier = $this->session->get('panier');
            if(array_key_exists($id,$panier)) {
                $panier[$id]--;
            }

            // -- Ecriture du $panier en $_SESSION
            $this->session->set('panier', $panier);
        }
    }

    //  XX Supprime l'$id dans $panier en $_SESSION
    public function xx_deleteArticle($id)
    {
        if (!empty($this->session->get('panier'))) {
            $panier = $this->session->get('panier');
            if(array_key_exists($id,$panier)) {
                unset($panier,$id);
            }

            // -- Ecriture du $panier en $_SESSION
            $this->session->set('panier', $panier);
        }
    }

    //  XX Calcul du nombre d'Article dans le $panier
    public function xx_countArticle()
    {
        $count=0;

        if (!empty($this->session->get('panier'))) {
            foreach ($panier as $quantite) {
                $count+=$quantite;
            }
        }

        // -- Ecriture en $_SESSION
        $this->session->set('panier-count', $count);
    }

}
