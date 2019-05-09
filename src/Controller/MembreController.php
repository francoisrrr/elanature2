<?php


namespace App\Controller;


use App\Entity\Membre;
use App\Form\ConnexionFormType;
use App\Form\MembreFormType;
use App\Form\ModificationFormType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class MembreController extends AbstractController
{
    /**
     * @Route("/inscription.html", name="membre_inscription")
     *
     */
    public function inscription(Request $request, UserPasswordEncoderInterface $encoder)
    {
        # création d'un Membre
        $membre = new Membre();
        $membre->setRoles(['ROLE_MEMBRE']);

        # création du Formulaire "MembreFormType"
        $form = $this->createForm(MembreFormType::class, $membre);

        $form->handleRequest($request);


        if($request->getMethod() == 'POST') {

            $adresse = $form['adresse']->getData();
            $cp = $form['cp']->getData();
            $ville = $form['ville']->getData();
            $membre->setAdresselivraison([$adresse, $cp, $ville]);
            $membre->setAdresseFacturation([$adresse, $cp, $ville]);
        }

        # vérification de la soumission du formulaire
        if ($form->isSubmitted() && $form->isValid()) {

            # encoder le mot de passe
            $membre->setPassword(
                $encoder->encodePassword($membre, $membre->getPassword())
            );

            # savegarde en BDD
            $em = $this->getDoctrine()->getManager();
            $em->persist($membre);
            $em->flush();

            # notification
            $this->addFlash('notice',
                'Félicitation, vous pouvez vous connecter!');

            # redirection
            return $this->redirectToRoute('membre_connexion');
        }

        # affichage du Formulaire dans la vue
        return $this->render("membre/inscription.html.twig", [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/connexion.html", name="membre_connexion")
     */
    public function connexion(AuthenticationUtils $authenticationUtils)
    {
        # récupération du formulaire de connexion
        $form = $this->createForm(ConnexionFormType::class, [
            'email' => $authenticationUtils->getLastUsername()
        ]);


        # affichage du formulaire dans la vue
        return $this->render('membre/connexion.html.twig', [
            'form' => $form->createView(),
            'error' => $authenticationUtils->getLastAuthenticationError()
        ]);
    }

    /**
     * @Route("/view.html", name="membre_profil")
     */
    public function viewProfil()
    {
        return $this->render('membre/profil.html.twig');
    }

    /**
     * @Route("/modification.html", name="membre_modification")
     */

    public function modification(Request $request, UserPasswordEncoderInterface $encoder)
    {
        # récupérer Membre
        $membre = $this->getUser();

        # création du Formulaire "MembreFormType"
        $form = $this->createForm(ModificationFormType::class, $membre);
        $form->handleRequest($request);
        #$membre->get['adresse_livraison'][0]->setData($form['adresse']);

        if($request->getMethod() == 'POST') {

            $adresse = $form['adresse']->getData();
            $cp = $form['cp']->getData();
            $ville = $form['ville']->getData();
            $membre->setAdresselivraison([$adresse, $cp, $ville]);
            $membre->setAdresseFacturation([$adresse, $cp, $ville]);
        }

        # vérification de la soumission du formulaire
        if ($form->isSubmitted() && $form->isValid()) {

            # encoder le mot de passe
            $membre->setPassword(
                $encoder->encodePassword($membre, $membre->getPassword())
            );

            # savegarde en BDD
            $em = $this->getDoctrine()->getManager();
            $em->persist($membre);
            $em->flush();

            # notification
            $this->addFlash('notice',
                'Félicitation, vous avez bien modifié!');

            # redirection
            return $this->redirectToRoute('membre_profil');
        }

        # affichage du Formulaire dans la vue
        return $this->render("membre/modification.html.twig", [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/suppression/{id}.html", name="membre_suppression")
     */
    public function suppression($id)
    {
        $currentMembreId = $this->getUser()->getId();

        $em = $this->getDoctrine()->getManager();
        $membre = $em->getRepository(Membre::class)->find($id);

        if ($currentMembreId == $id)
        {
            $session = $this->get('session');
            $session = new Session();
            $session->invalidate();
        }

        $em->remove($membre);
        $em->flush();

        $this->addFlash('notice', 'Vous avez bien supprimé votre compte!');

        return $this->redirectToRoute('membre_inscription');

    }
    /**
     * @Route("/deconnexion.html", name="membre_deconnexion")
     */
    public function deconnexion()
    {
        
    }
}