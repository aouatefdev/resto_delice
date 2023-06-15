<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\AllBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ReservationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('evenement', ChoiceType::class, [
                'label' => 'Type d\'évènement:',
                'label_attr' => ['class' => 'text-secondary mt-3 fw-bold mb-1'],
                'attr' => ['class' => 'form-select mb-4'],
                'choices' => [
                    'Choisir...' => '',
                    'Soirée familiale: anniversaire, evenement familial...' => 'soiree_familiale',
                    'Verre entre Collègues: afterwork, pot de départ...' => 'verre_collegues',
                    'Evénement Romantique: demande au mariage, rendez-vous amoureux...' => 'evenement_romantique',
                    'Affaire d\'entreprise: soirée, dîner, cocktail...' => 'affaire_entreprise',
                    'Journée d\'étude: réunion, conférence...' => 'journee_etude',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Vous devez choisir un évènement.',
                    ])
                ]
            ])
            ->add('participants', ChoiceType::class, [
                'label' => 'Nombre de Participants:*',
                'label_attr' => ['class' => 'text-secondary fw-bold mb-1'],
                'attr' => ['class' => 'form-select mb-4'],
                'choices' => [ 0 => false , 1 => true, 2 => true, 3 => true, 4 => true, 5 => true,
                 6 => true, 7 => true, 8 => true, 9 => true, 10 => true],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Minimum 1 participant',
                    ])
                ]   
            ])
            ->add('time', DateTimeType::class, [
                'label' => 'Date et Heure de la réservation:',
                'label_attr' => ['class' => 'text-secondary fw-bold mb-1'],
                'attr' => ['class' => 'mb-4']
            ])
            ->add('firstname', TextType::class,[
                'label' => 'Prénom:',
                'label_attr' => ['class' => 'text-secondary fw-bold mb-1'],
                'attr' => [
                    'class' => 'form-control mb-4'
                ]
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Nom:',
                'label_attr' => ['class' => 'text-secondary fw-bold mb-1'],
                'attr' => ['class' => 'form-control mb-4']
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email:',
                'label_attr' => ['class' => 'text-secondary fw-bold mb-1'],
                'attr' => ['class' => 'form-control mb-4']
            ])
            ->add('phone', TelType::class, [
                'label' => 'Numéro de téléphone:',
                'label_attr' => ['class' => 'text-secondary fw-bold mb-1'],
                'attr' => ['class' => 'form-control mb-4'],
                'constraints' => [
                    new Length([
                        'min' => 10,
                        'minMessage' => 'Votre Numéro doit avoir 10 characters',
                        'max' => 10, 
                    ])
                ]
            ])
            ->add('message', TextareaType::class, [
                'required' => false,
                'label' => 'Message à l\'établissement (facultatif) :',
                'label_attr' => ['class' => 'text-secondary fw-bold'],
                'attr' => [
                    'class' => 'form-control mb-4',
                    'style' => 'height: 75px',
                ]      
            ])                             
            ->add('submit', SubmitType::class, [
                'label' => 'Enregistrer',
                'attr' => [
                    'class' => 'btn text-center w-100 mb-2 p-2',
                    'style' => 'background: #F38C1E ',
                ] 
            ]) 
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            "allow_extra_fields" => true,
        ]);
    }
}
