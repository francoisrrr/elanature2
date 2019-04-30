<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 30/04/2019
 * Time: 15:07
 */

namespace App\Form;



use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ArticleFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class,[
                'required' => true,
                'label' => "Nom de l'article",
                'attr' => [
                    'placeholder' => "Nom de l'article"
                ]
            ])
            ->add('description', TextareaType::class,[
                'required' => true,
                'label' =>true,
                'attr' => [
                    'placeholder' => "Description"
                ]
            ])
            ->add('prix',MoneyType::class,[
                'required' => true,
                'label' => true

            ])
            ->add('stock',NumberType::class,[
                'required' => true,
                'label' =>true
            ])
            /*->add('photos',FileType::class,[
                'required' => true,
                'label' =>false,
                'attr'=> [
                    'class'=> 'dropify'
                ]
            ])*/
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        /*
         * Ici, mon formulaire ArticleFormType travaillera OBLIGATOIRMENT
         * avec des instances de App/Entity/Article
         */
        $resolver->setDefault('data_class',Article::class);
    }

    public function getBlockPrefix()
    {
        /*
         * Permet de prefixer les id et name des formulaires
         */
        return 'form';
    }
}