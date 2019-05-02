<?php


namespace App\Controller;


use App\Entity\Article;
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
        $repository = $this->getDoctrine()
            ->getRepository(Article::class);

        # Je recupere tous les articles de ma base
        $articles = $repository->findAll();
        $promotion = $repository->findAll();

        # Transmission a la vue pour affichage
        return $this->render("default/index.html.twig", [
            'articles' => $articles,
            'promotion' => $promotion
        ]);

    }
}