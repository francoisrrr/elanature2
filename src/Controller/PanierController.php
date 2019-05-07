<?php

/*
 * --------------------------------------------------------
 * REFERENCES
 * --------------------------------------------------------
 *
 * https://stackoverflow.com/questions/12243230/shopping-cart-bundle-with-symfony2
 * http://www.expreg.com/expreg_article.php?art=caddie
 * https://jcrozier.developpez.com/articles/web/panier
 *
 */

/*
 * --------------------------------------------------------
 * DESCRIPTION
 * --------------------------------------------------------
 *
 * Ensemble des fonctions executables sur la classe Panier
 * Ces fonctions sont accessibles via leurs @Route respectives.
 * Par exemple :
 *      href="{{ path('@Route_name',{
                            'parameter1' : value1,
                            'parameter2' : value2
               }) }}"
 *
 */


namespace App\Controller;

use App\Entity\Article;
use App\Panier\Panier;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/panier")
 * Toutes les routes sont préfixées par "/panier"
 */
class PanierController extends AbstractController
{
    use HelperTrait;

    /**
     * @Route("/", name="panier")
     * @param Panier $panier
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexPanier(Panier $panier, SessionInterface $session)
    {
        dump($panier->getPanier());
        die();
        // fetch the information using query and ids in the cart
//        if($panier != '') {
//
//            foreach($panier as $id => $quantite) {
//                $articleIds[] = $id;
//            }
//
//            if(isset($articleIds)){
//                $em = $this->getDoctrine()->getEntityManager();
//                $products = $em->getRepository('WebmuchProductBundle:Product')->findById( $productIds );
//            } else {
//                return $this->render('WebmuchCartBundle:Cart:index.html.twig', array(
//                    'empty' => true,
//                ));
//            }
//
//            return $this->render('WebmuchCartBundle:Cart:index.html.twig', array(
//                'products' => $products,
//            ));
//
//        } else {
//            return $this->render('WebmuchCartBundle:Cart:index.html.twig', array(
//                'empty' => true,
//            ));
//        }

        //return $this->render('base.html.twig');
    }

    /**
     * Modifie $quantite d'Article dans le $panier en $_SESSION
     * @Route("/add/{id}", name="panier_add_article")
     * @param Panier $panier
     * @param Article $article
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function addArticle(Panier $panier,Article $article, $id)
    {
        // -- Récupération de $article en BDD
        $repository = $this->getDoctrine()
            ->getRepository(Article::class);
        $article = $repository->find($id);

        // -- Ajout de $quantity de $article au $panier en $_SESSION
        $panier->addArticle($article,1);

        // -- Redirection vers $panier
        return $this->redirectToRoute('panier');
    }

    /**
     * Mise à zéro de la $quantite pour un Article dans le $panier en $_SESSION
     * @Route("/remove/{id}", name="panier_remove_article")
     * @param Article $article
     * @param Panier $panier
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function removeArticle(Panier $panier,$id)
    {

    }

    /**
     * Suppression du $panier en $_SESSION
     * @Route("/delete", name="panier_delete")
     * @param Panier $panier
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deletePanier(Panier $panier)
    {
        $panier->deletePanier();

        // -- Redirection vers $panier
        return $this->redirectToRoute('panier');
    }

}
