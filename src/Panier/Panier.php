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

    private $session, $manager, $products = [];

    /**
     * Panier constructor.
     * @param $session
     * @param $manager
     */
    public function __construct(SessionInterface $session, ObjectManager $manager)
    {
        $this->session = $session;
        $this->manager = $manager;
    }

    public function getProducts()
    {
        return $this->session->get('panier');
    }

    public function vider()
    {
        $this->session->remove('panier');
    }

    public function addProduct(Article $article)
    {
        // vérifier si le produit est deja presence in_array
        // ajouter le produit au panier
        $this->products[] = $article;
        $this->session->set('panier', $this->products);
    }

    //  Calcul du nombre d'Article dans le $panier
     /* 
        NB) Cette fonction fait seulement appel aux données en $_SESSION
        Elle peut être intégrée directement dans le template Twig.
     */

    public function countArticle()
    {
        $session = $this->getRequest()->getSession();
        $panier = $session->get('panier', array());

        $count = null;

        foreach ($panier as $quantite) {
            $count+=$quantite;
        }

        return $count;
    }

    //  Calcul du total du $panier
    
    public function totalPanier()
    {
        $panier = $this->session->get('panier', array());
        $total = 0;

        foreach ($panier as $id => $quantite) {

            // -- Récupération en BDD de l'Article correspondand à $id
            $article = $this->manager
                ->getRepository(Article::class)
                ->findOneBy(array('id'=>$id));


            // -- Récupération de $prix
//            $article->get

            // -- Incrémentation du total
//            $total += $quantite*$prix;



        }

        return $total;
    }


}
