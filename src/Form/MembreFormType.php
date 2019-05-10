<?php


namespace App\Form;


use App\Entity\Membre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MembreFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => false,
                'attr'  => [
                    'placeholder' => 'Votre nom'
                ]
            ])
            ->add('prenom', TextType::class, [
                'label' => false,
                'attr'  => [
                    'placeholder' => 'Votre prénom'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => false,
                'attr'  => [
                    'placeholder' => 'Votre email'
                ]
            ])
            ->add('password', PasswordType::class, [
                'label' => false,
                'attr'  => [
                    'placeholder' => 'Votre mot de passe'
                ]
            ])
            ->add('adresse', TextType::class, [
                'label' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer votre adresse',
                    ])
                ],
                'attr'  => [
                    'placeholder' => 'Votre adresse'
                ]
            ])
            ->add('cp', TextType::class, [
                'label' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer votre code postal',
                    ])
                ],
                'attr'  => [
                    'placeholder' => 'Votre CP'
                ]
            ])
            ->add('ville', TextType::class, [
                'label' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer votre ville',
                    ])
                ],
                'attr'  => [
                    'placeholder' => 'Votre ville'
                ]
            ])
            ->add('termsAccepted', CheckboxType::class, [
                'mapped' => false,
                'label' => 'Conditions générales acceptés',
                'constraints' => new IsTrue(),
            ])
            ->add('submit', SubmitType::class, [
                'label' => "Je m'inscris!"
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('data_class', Membre::class);
    }
}