<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class UserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Votre prénom',
                'label_attr' => ['class' => 'text-secondary fw-bold mb-1'],
                'attr' => ['class' => 'form-control mb-3']
                ])
            ->add('lastname', TextType::class, [
                'label' => 'Votre nom ',
                'label_attr' => ['class' => 'text-secondary fw-bold mb-1'],
                'attr' => ['class' => 'form-control mb-3']
                ])
            ->add('email', EmailType::class, [
                'label' => 'Votre email ',
                'label_attr' => ['class' => 'text-secondary fw-bold mb-1'],
                'attr' => ['class' => 'form-control mb-3']
                ])
            ->add('address', TextType::class, [
                'label' => 'Votre adresse ',
                'label_attr' => ['class' => 'text-secondary fw-bold mb-1'],
                'attr' => ['class' => 'form-control mb-3']
                ])
            ->add('zipcode', IntegerType::class, [
                'label' => 'Votre code postal ',
                'label_attr' => ['class' => 'text-secondary fw-bold mb-1'],
                'attr' => ['class' => 'form-control mb-3']
                ])
            ->add('city', TextType::class, [
                'label' => 'Votre ville ',
                'label_attr' => ['class' => 'text-secondary fw-bold mb-1'],
                'attr' => ['class' => 'form-control mb-3']
                ])
            ->add('phone', TextType::class, [
            'label' => 'Votre Tél-Mobile',
            'label_attr' => ['class' => 'text-secondary fw-bold mb-1'],
            'attr' => ['class' => 'form-control mb-4']
                ])
            ->add('submit', SubmitType::class, [
                'label' => 'Valider',
                ]) 
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
           // Configure your form options here
        ]);
    }
}
