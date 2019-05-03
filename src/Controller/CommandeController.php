<?php

// https://stackoverflow.com/questions/12243230/shopping-cart-bundle-with-symfony2


namespace App\Controller;

use App\Entity\Commande;
use App\Form\CommandeFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


/**
 * @Route("/panier")
 */
class CommandeController extends AbstractController
{
    use HelperTrait;

    /**
     * @Route("/", name="cart")
     */
    // IN PROGRESS
    public function indexCart()
    {
        //**************************************************************************************
        // get the cart from  the session
        $session = $this->getRequest()->getSession();
        // $cart = $session->set('cart', '');
        $cart = $session->get('cart', array());

        // $cart = array_keys($cart);
        // print_r($cart); die;

        // fetch the information using query and ids in the cart
        if( $cart != '' ) {

            foreach( $cart as $id => $quantity ) {
                $productIds[] = $id;

            }

            if( isset( $productIds ) )
            {
                $em = $this->getDoctrine()->getEntityManager();
                $product = $em->getRepository('WebmuchProductBundle:Product')->findById( $productIds );
            } else {
                return $this->render('WebmuchCartBundle:Cart:index.html.twig', array(
                    'empty' => true,
                ));
            }

            return $this->render('WebmuchCartBundle:Cart:index.html.twig',     array(
                'product' => $product,
            ));
        } else {
            return $this->render('WebmuchCartBundle:Cart:index.html.twig',     array(
                'empty' => true,
            ));
        }
        //**************************************************************************************

    }

    /**
     * @Route("/add/{id}", name="cart_add")
     */
    // IN PROGRESS
    public function addArticle($id)
    {
        //**************************************************************************************
        // fetch the cart
        $em = $this->getDoctrine()->getEntityManager();
        $product = $em->getRepository('WebmuchProductBundle:Product')->find($id);
        //print_r($product->getId()); die;
        $session = $this->getRequest()->getSession();
        $cart = $session->get('cart', array());


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
        //**************************************************************************************
        //  -- Récupération du Membre en $_SESSION

        //  -- Récupération du panier en $_SESSION

        //$session = $this->getRequest()->getSession();
        //$cart = $session->get('cart', array());

        ///  -- Création d'une nouvelle Commande
        $commande = new Commande();

        ///  -- Création d'un formulaire permettant d'ajouter une commande
        $form = $this->createForm(CommandeFormType::class,$commande);

        //  -- Traitement des données du $_POST
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            ///  -- Génération du Slug
            $commande->setSlug($this->slugify("commande-ref-".$commande->getId()));

            ///  -- Sauvegarde en BDD
            $em=$this->getDoctrine()->getManager();
            $em->persist($commande);
            $em->flush();

            ///  -- Notification
            $this->addFlash('notice',
                'Félicitations votre commande a été enregistrée !');

            ///  -- Redirection
            return $this->redirectToRoute('index',[
                'slug' => $commande->getSlug(),
                'id' => $commande->getId()
            ]);
        }

        /*//
         *  -- Transmission des informations du panier à la Vue
         *     et affichage du formulaire
         */
        return $this->render("commande/addform.html.twig", [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/remove/{id}", name="cart_remove")
     */
    // IN PROGRESS
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



    /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        // md5() reduces the similarity of the file names generated by
        // uniqid(), which is based on timestamps
        return md5(uniqid());
    }

}
