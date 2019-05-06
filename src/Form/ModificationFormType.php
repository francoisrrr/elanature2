<?php


namespace App\Controller;


use App\Entity\Membre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class ModificationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer votre nom',
                    ]),
                    new Length([
                        'min' => 3,
                        'minMessage' => 'Un nom doit être minimum {{ limit }} characters',
                        'max' => 50,
                    ]),
                ],
                'attr'  => [
                    'placeholder' => 'Votre nom'
                ]
            ])
            ->add('prenom', TextType::class, [
                'label' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer votre prenom',
                    ]),
                    new Length([
                        'min' => 3,
                        'minMessage' => 'Un nom doit être minimum {{ limit }} characters',
                        'max' => 50,
                    ]),
                ],
                'attr'  => [
                    'placeholder' => 'Votre prénom'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer votre email',
                    ]),
                    new Regex([
                        'pattern' => '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i'
                    ]),
                ],
                'attr'  => [
                    'placeholder' => 'Votre email'
                ]
            ])
            ->add('password', PasswordType::class, [
                'label' => false,
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Un mot de passe doit être minimum {{ limit }} caracteres',
                        'max' => 4096,
                    ]),
                ],
                'attr'  => [
                    'placeholder' => 'Votre mot de passe'
                ]
            ])
            ->add('adresse', TextType::class, [
                'label' => false,
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer votre adresse',
                    ])
                ],
                'attr'  => [
                    'placeholder' => 'Votre adresse'
                ]
            ])
            ->add('cp', IntegerType::class, [
                'label' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer votre code postale',
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