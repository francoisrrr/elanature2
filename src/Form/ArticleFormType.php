<?php
/**
 * Created by PhpStorm.
 * User: Etudiant
 * Date: 03/05/2019
 * Time: 11:06
 */

namespace App\Form;



use App\Entity\Article;
use App\Entity\Categorie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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
            ->add('photos', FileType::class, array(
                'label' => 'Add images',
                'mapped' => false,
                'multiple' => true
            ))
            ->add('promotion',CheckboxType::class,[
                'required'=> false,
                'attr'=>[
                    'data-toggle'=>'toggle',
                    'data-on'=>'Oui',
                    'data-off'=>'Non'
                ]
            ])
            ->add('coup_de_coeur',CheckboxType::class,[
                'required'=> false,
                'attr'=>[
                    'data-toggle'=>'toggle',
                    'data-on'=>'Oui',
                    'data-off'=>'Non'
                ]
            ])
            ->add('nouveaute',CheckboxType::class,[
                'required'=> false,
                'attr'=>[
                    'data-toggle'=>'toggle',
                    'data-on'=>'Oui',
                    'data-off'=>'Non'
                ]
            ])
            ->add('categorie',EntityType::class, [
                'class' => Categorie::class,
                'choice_label'=>'nom',
                'label' =>false
            ])
            ->add('submit',SubmitType::class,[
                'label'=>'Publier mon Article'
            ])


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