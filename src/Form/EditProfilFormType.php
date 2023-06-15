<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class EditProfilFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('firstname', TextType::class, [
        'label' => 'Votre prénom',
        'label_attr' => ['class' => 'text-secondary fw-bold  text-capitalize'],
        'attr' => ['class' => 'form-control mb-4']
        ])
        ->add('lastname', TextType::class, [
            'label' => 'Votre nom ',
            'label_attr' => ['class' => 'text-secondary fw-bold  text-capitalize'],
            'attr' => ['class' => 'form-control mb-4']
            ])
        ->add('email', EmailType::class, [
            'label' => 'Votre email ',
            'label_attr' => ['class' => 'text-secondary fw-bold '],
            'attr' => ['class' => 'form-control mb-4']
            ])
        ->add('address', TextType::class, [
            'label' => 'Votre adresse ',
            'label_attr' => ['class' => 'text-secondary fw-bold '],
            'attr' => ['class' => 'form-control mb-4']
            ])
        ->add('zipcode', IntegerType::class, [
            'label' => 'Votre code postal ',
            'label_attr' => ['class' => 'text-secondary fw-bold '],
            'attr' => ['class' => 'form-control mb-4']
            ])
        ->add('city', TextType::class, [
            'label' => 'Votre ville ',
            'label_attr' => ['class' => 'text-secondary fw-bold '],
            'attr' => ['class' => 'form-control mb-4']
            ])
            ->add('phone', TextType::class, [
            'label' => 'Votre Tél-Mobile',
            'label_attr' => ['class' => 'text-secondary fw-bold '],
            'attr' => ['class' => 'form-control mb-5']
            ])
        ->add('Valider', SubmitType::class,  [
            'attr' => ['class' => 'col-sm-12 bg-success mb-5 text-light mt-2 p-1 ']
            ]) 
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
