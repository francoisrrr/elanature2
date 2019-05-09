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

    /*
     * Par Saadatou : pour tester la notification par email
     * */
    public function sendEmail($content)
    {
        // Verifier le serveur pour eviter qu'il se plante
        if ($_SERVER['SERVER_NAME'] == 'localhost') {
            //Instancier
            $transport = Swift_SmtpTransport::newInstance('mailtrap.io', 2525)
                ->setUsername('4f5ee5f82e69e8') //'username mailtrap'
                ->setPassword('25a9d5460a9f07'); //password mailtrap
        } else {
            /*
             * Possibilite de commencer car Swift_SmtpTransport (MAILER_URL=smtp) configure dans le .env
             * */
            $transport = Swift_MailTransport::newInstance();
        }

        $mailer = Swift_Mailer::newInstance($transport);
        $content = (new \Swift_Message('Alerte seuil critique'))
            ->setFrom('zinarya@yahoo.fr')
            ->setTo('zinarya@yahoo.fr')
            ->setBody( $content, 'text/html' );

        $mailer->send($content);
    }
    
    public function validerPanier()
    {
        $repository = $this->getDoctrine()
            ->getRepository(Article::class);

        # Je récupère tous les articles de ma base.
        $articles = $repository->findAll();

        #Je recupere mon tableau de tous les articles dont le stock < 5
        $seuil_critique = $repository->findByStockCritique();
        
        $message='';
        
        if(count($seuil_critique) > 0 ){
            foreach ($seuil_critique as $item){
               $message.= $item->getNom().' a atteint '.$item->getStock().' en stock';
               $this->sendEmail($message);
            }
        }
    }
}