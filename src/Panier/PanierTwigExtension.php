<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 09/05/2019
 * Time: 14:37
 */

namespace App\Panier;


use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class PanierTwigExtension extends AbstractExtension
{

    private $panier;

    /**
     * PanierTwigExtension constructor.
     * @param $panier
     */
    public function __construct(Panier $panier)
    {
        $this->panier = $panier;
    }

    public function getFunctions()
    {
        return [
          new TwigFunction('nbProducts', function() {
              return $this->panier->countPanier();
          })
        ];
    }

}