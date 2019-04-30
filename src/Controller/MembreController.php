<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MembreController extends AbstractController
{
    /**
     * @Route("/inscription.html", name="membre_inscription")
     */
    public function inscription(Request $request)
    {
        #création d'un Membre
        $membre = new Membre();
        $membre->setRoles(['ROLE_MEMBRE']);

        #création du Formulaire "MembreFormType"
        $form = $this->createForm();
    }
}