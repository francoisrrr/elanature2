<?php


namespace App\Controller;


use App\Entity\Article;
use App\Entity\Categorie;
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
        $promotion = $repository->findByPromotion();


        # Transmission a la vue pour affichage
        return $this->render("default/index.html.twig", [
            'articles' => $articles,
            'promotion' => $promotion
        ]);

    }

    /**
     * Page permettant d'afficher les articles d'une categorie
     * @Route("/categorie/{slug<[a-zA-Z0-9\-_\/]+>}",
     *      defaults={"slug"="default"},
     *      methods={"GET"},
     *      name="default_categorie")
     *
     */
    public function categorie($slug)
    {
        /*
         * Recuperer la categorie correspondant au slug passer en parametre de la route
         * -----------------------------------------------------------------------------
         * On recupere le parametre slug de la route (url) dans notre variable $slug
         */
        $categorie = $this->getDoctrine()
            ->getRepository(Categorie::class)
            ->findOneBy(['slug' => $slug]);
        #dump($categorie);
        #die();
        #dump(Categorie::class);

        /*
         * Grace a la relation entre Article et Categorie(OneToMany), je suis en mesure de
         * recuperer les articles d'une categorie
         */

        $articles = $categorie->getArticle();




        /*
         * J'envoi a ma vue les donnees a afficher.
         */


        return $this->render("default/categorie.html.twig", [
            'articles' => $articles,
            'categorie' => $categorie

        ]);
        #return new Response("<html><body><h1>Page Categorie : $slug </h1></body></html>");
    }

    /**
     * @Route("/{categorie}/{slug}_{id<\d+>}.html" ,name="default_article")
     */

    public function article($id)
    {
        /*
         * Recuperation de l'article correspondent a l'id en parametre de notre route
         */
        $article = $this->getDoctrine()
            ->getRepository(Article::class)
            ->find($id);

        return $this->render("default/article.html.twig", [
            'article' => $article
        ]);

    }

    public function sidebar()
    {
        $repository = $this->getDoctrine()
            ->getRepository(Article::class);
        # REcuperation des 5 derniers articles
        $promotion = $repository->findByPromotion();
        # Recuperation des articles a la position "couu_de_coeur"
        $coup_de_coeur = $repository->findByCoupDeCoeur();

        # Transmission des info a la vue
        return $this->render('default/article.html.twig',[
            'promotion' => $promotion,
            'coup_de_coeur' => $coup_de_coeur
        ]);




    }
}