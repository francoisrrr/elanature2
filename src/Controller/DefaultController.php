<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class DefaultController extends AbstractController
{
    /**
     * Page d'Accueil
     * @Route("/", name="index")
     */
    public function index()
    {
//        // !!! Debug $panier !!!
//        $panier=[
//            'id_article1'=>'3',
//            'id_article2'=>'1'
//        ];
//        $session = $this->getRequest()->getSession();
//        $session->set('panier',$panier);
//        // !!! Debug $panier !!!


        return $this->render("default/index.html.twig");
    }
}