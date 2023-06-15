<?php

namespace App\Controller;

use App\Entity\Commandes;
use App\Entity\CommandeItem;
use App\Form\EditProfilFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;

class UserController extends AbstractController 
{  
    #[Route('/user', name: 'app_user')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        if ($this->getUser()) {
            $user = $this->getUser();
        }

        $commandes = $entityManager->getRepository(Commandes::class)->findBy(['user' => $user]);
        $commandeItems = [];

            foreach ($commandes as $commande) {
                $commandeItems[] = $entityManager->getRepository(CommandeItem::class)->findBy(['commandes' => $commande]);
            }
        return $this->render('user/index.html.twig', [
            'user' => $user,
            'commandes' => $commandes,
            'commandeItems' => $commandeItems,
            'count' => count($commandes),
        ]);

    }

    #[Route('/user/edit', name: 'user_edit')]
    public function editProfil(Request $request, EntityManagerInterface $manager): Response 
    {  

        $user = $this->getUser();
        $form = $this->createForm(EditProfilFormType::class, $this->getUser());
        
        $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $user = $this->getUser();
                    $user = $form->getData();
                    $manager->persist($user);
                    $manager->flush();

           $this->addFlash('success', 'Votre profile a été mis à jour');
           
           return $this->redirectToRoute("app_user");
        }
        
        return $this->render('user/editProfil.html.twig',[
            'form'=>$form->createView(),
        ]);
    }

  
    #[Route("/inscription", name:"inscription")]
    public function inscription(MailerInterface $mailer): Response
    {
        // ... code pour créer un nouveau utilisateur et l'ajouter à la base de données

        // Envoie l'email de confirmation
        $email = (new TemplatedEmail())
            ->from($_ENV['MAILER_FROM'])
            ->to($user->getEmail())
            ->subject('Confirmation d\'inscription')
            ->htmlTemplate('emails/confirmation_inscription.html.twig')
            ->context([
                'user' => $user,
            ])
        ;

        $mailer->send($email);

        // ... code pour rediriger l'utilisateur vers une page de confirmation
    }
}


