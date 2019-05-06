<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

// http://www.expreg.com/expreg_article.php?art=caddie
// https://jcrozier.developpez.com/articles/web/panier/
// https://stackoverflow.com/questions/12243230/shopping-cart-bundle-with-symfony2

/*
 * --------------------------------------------------------
 * DESCRIPTION
 * --------------------------------------------------------
 * La classe Panier reçoit les Article->$id et
 * les CommandeArticle->$quantite et les stocke en $_SESSION
 * 
 * Cette classe ne correspond pas à une table en BDD. Elle n'est
 * pas prise en compte par l'ORM.
 * 
 */


class Panier
{

    private $toto;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
    }

    public function setToto(): ?int
    {
        return null;
    }

    public function getToto(): ?int
    {
        return $this->toto;
    }


}
