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
 * Ces fonctions sont accessibles dans les templates Twig.
 * Par exemple :
 * href="{{ path('Route_name',{
                            'parameter1' : value1,
                            'parameter2' : value2
                        }) }}"
 *
 */


namespace App\Controller;

use App\Entity\Article;
use App\Form\CommandeFormType;
use App\Panier\Panier;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/panier")
 * Toutes les routes sont préfixées par "/panier"
 */
class PanierController extends AbstractController
{
    use HelperTrait;

    /**
     * @Route("/", name="cart")
     * @param Panier $panier
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexPanier(Panier $panier)
    {

        $article = $this->getDoctrine()->getRepository(Article::class)
            ->find(1);

        $panier->addProduct($article);
//        dump($panier->getProducts());

        die();

        // fetch the information using query and ids in the cart
        if($panier != '') {

            foreach($panier as $id => $quantite) {
                $articleIds[] = $id;
            }

            if(isset($articleIds)){
                $em = $this->getDoctrine()->getEntityManager();
                $products = $em->getRepository('WebmuchProductBundle:Product')->findById( $productIds );
            } else {
                return $this->render('WebmuchCartBundle:Cart:index.html.twig', array(
                    'empty' => true,
                ));
            }

            return $this->render('WebmuchCartBundle:Cart:index.html.twig', array(
                'products' => $products,
            ));

        } else {
            return $this->render('WebmuchCartBundle:Cart:index.html.twig', array(
                'empty' => true,
            ));
        }
    }

    /**
     * @Route("/add/{id}", name="cart_add")
     * @param $id
     * @param Panier $panier
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function addArticle($id, Panier $panier)
    {

        $panier->totalPanier();

        //**************************************************************************************
        // fetch the cart
        $products = $panier->getProducts();

        dump($products);
        die();

        // check if the $id already exists in it.
        if ( $product == NULL ) {
            $this->get('session')->setFlash('notice', 'This product is not     available in Stores');
            return $this->redirect($this->generateUrl('cart'));
        } else {
            if( isset($cart[$id]) ) {

                $qtyAvailable = $product->getQuantity();

                if( $qtyAvailable >= $cart[$id]['quantity'] + 1 ) {
                    $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
                } else {
                    $this->get('session')->setFlash('notice', 'Quantity     exceeds the available stock');
                    return $this->redirect($this->generateUrl('cart'));
                }
            } else {
                // if it doesnt make it 1
                $cart = $session->get('cart', array());
                $cart[$id] = $id;
                $cart[$id]['quantity'] = 1;
            }

            $session->set('cart', $cart);
            return $this->redirect($this->generateUrl('cart'));

        }
    }

    /**
     * @Route("/remove/{id}", name="cart_remove")
     */
    public function removeArticle($id)
    {
        //**************************************************************************************
        // check the cart
        $session = $this->getRequest()->getSession();
        $cart = $session->get('cart', array());

        // if it doesn't exist redirect to cart index page. end
        if(!$cart) { $this->redirect( $this->generateUrl('cart') ); }

        // check if the $id already exists in it.
        if( isset($cart[$id]) ) {
            // if it does ++ the quantity
            $cart[$id]['quantity'] = '0';
            unset($cart[$id]);
            //echo $cart[$id]['quantity']; die();
        } else {
            $this->get('session')->setFlash('notice', 'Go to hell');
            return $this->redirect( $this->generateUrl('cart') );
        }

        $session->set('cart', $cart);

        // redirect(index page)
        $this->get('session')->setFlash('notice', 'This product is Remove');
        return $this->redirect( $this->generateUrl('cart') );
        //**************************************************************************************
    }

    public function modifyQuantite($id, $quantite)
    {
        for ($i=0; $i < 10; $i++) { 
            addArticle();
        }
    }

    /*
     * Suppression du panier de la $_SESSION
     */
    public function deletePanier()
    {
        $session = $this->getRequest()->getSession();
        $session->unset('panier');
    }
    /**
     * @Route("/paiement", name="paiement")
     */
    public function paiement()
    {
        \Stripe\Stripe::setApiKey('sk_test_DAZeQIOuZ05UjUl92MreRg4200cQtkFLQX');
        $charge = \Stripe\Charge::create(['amount' => 100000, 'currency' => 'eur', 'source' => 'tok_visa']);
        echo $charge;

        return $this->redirectToRoute("/panier" );
    }
}
