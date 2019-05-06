<?php
/**
 * Created by PhpStorm.
 * User: Karim
 * Date: 01/05/2019
 * Time: 22:37
 */

namespace App\Controller\admin;


use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends EasyAdminController
{
    // ...

    /*public function updateEntity($entity)
    {
        if (method_exists($entity, 'setUpdatedAt')) {
            $entity->setUpdatedAt(new \DateTime());
        }

        parent::updateEntity($entity);
    }*/

    public function persistEntity($entity)
    {
        $this->updateSlug($entity);
        parent::persistEntity($entity);
    }

    public function updateEntity($entity)
    {
        $this->updateSlug($entity);
        parent::updateEntity($entity);
    }

    private function updateSlug($entity)
    {
        if (method_exists($entity, 'setSlug') and method_exists($entity, 'getTitle')) {
            $entity->setSlug($this->slugger->slugify($entity->getTitle()));
        }
    }

    // Customizes the instantiation of entities only for the 'User' entity
    public function createNewUserEntity()
    {
        return new User(array('ROLE_USER'));
    }

    /*******************************************************************/
    /**
     * @Route("/login" , name="login")
     */
    public function loginAction()
    {
        return $this->render('admin/login.html.twig');
    }

    /**
     * @Route("/logout" )
     * @throws \RuntimeException
     */
    public function logoutAction()
    {
        throw new \RuntimeException('Ce message ne doit pas etre atteint');
    }

}