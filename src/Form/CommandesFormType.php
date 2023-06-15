<?php

namespace App\Form;

use App\Entity\Users;
use App\Entity\Commandes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class CommandesFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('quantity', IntegerType::class)
            ->add('montantTotal', NumberType::class)
            ->add('titre', TextType::class)
            ->add('prix', NumberType::class)
            ->add('totalQtt', IntegerType::class)  
            ->add('imageFile', FileType::class, [
               'mapped' => false,
            ])  
            ->add('users', EntityType::class, [
                'class' => Users::class,
                'choice_label' => 'getFullName',
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Valider',
                ]) 
            ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commandes::class,
        ]);
    }
}
