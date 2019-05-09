<?php

namespace App\Controller;

use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends EasyAdminController

{
    /**
     * @Route("/dashboard", name="admin_dashboard")
     */
    /*public function dashboard()
    {
        return $this->render('admin/index.html.twig');
    }*/
}
