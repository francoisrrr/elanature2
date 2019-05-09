<?php


namespace App\Form;

use App\Entity\Panier;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/*
 * --------------------------------------------------------
 * DESCRIPTION
 * --------------------------------------------------------
 * Formulaire de checkout du $panier
 *      - Bouton submit "checkout" (i.e. paiement et mise en BDD Commande)
 *
*/


class PanierFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('submit', SubmitType::class, [
                'label' => "Je m'inscris!"
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('data_class', Membre::class);
    }
}