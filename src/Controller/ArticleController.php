<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 30/04/2019
 * Time: 12:10
 */

namespace App\Controller;


use App\Entity\Article;


use App\Entity\Categorie;
use App\Form\ArticleFormType;
use http\Client\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    use HelperTrait;

    /**
     * @Route("demo/article", name="article_demo")
     */
    public function demo()
    {



        $categorie = $this->getDoctrine()
            ->getRepository(Categorie::class)
            ->find(1);

        # Creation d'un Article
        $article = new Article();
        $article->setNom("testbougie");
        $article->setDescription("<p>This is a test.</p>");
        $article->setPrix(12)
            ->setStock(23)
            ->setPhotos(["123.jpg"])
            ->setPromotion(1)
            ->setCoupDeCoeur(0)
            ->setNouveaute(1)
            ->setCategorie($categorie)
            ->setSlug($this->slugify($article->getNom()));


        /*
         * Recuperation du Manager de Doctrine
         * -----------------------------------
         * Le EntityManager est un classe qui
         * sait comment persister d'autres
         * classes. (Effectuer des operations
         * CRUD sur nos Entités
         */
        $em = $this->getDoctrine()->getManager();  //Permet de recuperer le EntityManager de Doctrine

        $em->persist($article);  // Et L'Article
        $em->flush();  // J'execute le tout

        # Retourner une reponse à la vue
        return new Response('Nouvel Article ajouté avec ID : '
            . $article->getId()
            . 'et la nouvelle categorie '

        );

    }

    /**
     * @Route("/create-an-article", name="article_add")
     */
    public function addArticle()
    {
        $article = new Article();

        $article = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findAll();


        $form = $this->createForm(ArticleFormType::class, $article);
        $photo= $form['photo']->getData();
        # Affichage du formulaire dans la vue
        return $this->render("default/index.html.twig",[
            'form' => $form->createView()
        ]);

    }


}

