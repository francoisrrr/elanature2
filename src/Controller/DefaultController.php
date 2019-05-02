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
        return $this->render("default/index.html.twig");
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