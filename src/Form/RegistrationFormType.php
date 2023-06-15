<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
                'label_attr' => ['class' => 'text-secondary fw-bold mb-1 text-capitalize'],
                'attr' => ['class' => 'form-control mb-4']
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Nom ',
                'label_attr' => ['class' => 'text-secondary fw-bold mb-1 text-capitalize'],
                'attr' => ['class' => 'form-control mb-4']
            ])
            ->add('address', TextType::class, [
                'label' => 'Adresse ',
                'label_attr' => ['class' => 'text-secondary fw-bold mb-1'],
                'attr' => ['class' => 'form-control mb-4']
            ])
            ->add('zipcode', IntegerType::class, [
                'label' => 'Code postal ',
                'label_attr' => ['class' => 'text-secondary fw-bold mb-1'],
                'attr' => ['class' => 'form-control mb-4']
            ])
            ->add('city', TextType::class, [
                'label' => 'Ville ',
                'label_attr' => ['class' => 'text-secondary fw-bold mb-1'],
                'attr' => ['class' => 'form-control mb-4']
            ])
            ->add('phone', TelType::class, [
                'label' => 'Tél-Mobile',
                'label_attr' => ['class' => 'text-secondary fw-bold mb-1'],
                'attr' => ['class' => 'form-control mb-4'],
                'constraints' => [
                    new Length([
                        'min' => 10,
                        'minMessage' => 'Votre Numéro doit avoir 10 characters',
                        'max' => 10,
                    ]),
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email ',
                'label_attr' => ['class' => 'text-secondary fw-bold mb-1'],
                'attr' => ['class' => 'form-control mb-4']
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les champs de mot de passe doivent correspondre.',
                'first_options'  => [
                    'label' => 'Mot de passe',
                    'label_attr' => ['class' => 'text-secondary fw-bold mb-1 text-capitalize'],
                    'attr' => ['class' => 'form-control mb-4 password-field'],
                ],
                'second_options' => [
                    'label' => 'Confirmer mot de passe',
                    'label_attr' => ['class' => 'text-secondary fw-bold mb-1 text-capitalize'],
                    'attr' => ['class' => 'form-control mb-4'],
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Valider',
                'attr' => ['class' => 'form-control text-light fw-bold mb-4 w-100 mt-4 btn btn-primary'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
