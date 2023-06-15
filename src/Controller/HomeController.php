<?php

namespace App\Controller;

use App\Form\ContactFormType;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Transport\TransportInterface;
use App\Repository\PlatsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home', methods: ['GET', 'POST'])]
    public function index(TransportInterface  $mailer, Request $request, SessionInterface $session, PlatsRepository $platsRepository)
    {
        $panier = $session->get('panier', []);
        $panierData = [];

        $montantTotal = 0;
        $totalQtt = 0;
        if ($totalQtt === 0) {
            $totalQtt = null;
        }

        foreach ($panier as $id => $quantity) {

            $plats = $platsRepository->find($id);
            $image = $plats->getImageName();

            if ($plats !== null) {
                $panierData[] = [
                    'imageName' => $image,
                    'plats' => $plats,
                    'quantity' => $quantity,
                ];
        
                $prix = $plats->getPrix();
                
                $montantTotal += $prix * $quantity;
                $totalQtt += $quantity;
            }
        }

        $form = $this->createForm(ContactFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();
            $senderEmail = $data['email']; 
      
            $email = (new Email())
                ->from($senderEmail)
                ->to('admin@exemple.com') 
                ->subject($data['sujet'])
                ->text(sprintf(
                    "Nom : %s\nPrénom : %s\nAdresse e-mail : %s\n\nMessage :\n%s",
                    $data['nom'],
                    $data['prenom'],
                    $senderEmail,
                    $data['message']
                ));
        
            $mailer->send($email);

            $this->addFlash('success', 'Votre message a été envoyé avec succès.');

            return $this->redirectToRoute('app_home', ['#contact']);
        }

        return $this->render('home/index.html.twig', [
            'form' => $form->createView(),
            'panierData' => $panierData,
            'montantTotal' => $montantTotal,
            'totalQtt' => $totalQtt,
        ]);
    }


    #[Route('/home/add/{id}', name:'home_add')]
    function add($id, SessionInterface $session)
    {
        // On récupère le panier actuel
        $panier = $session->get('panier', []);

        if (!empty($panier[$id])) {
            $panier[$id]++;
        } else {
            $panier[$id] = 1;
        }

        // On sauvegarde dans la session
        $session->set("panier", $panier);

        return $this->redirectToRoute("app_home");
    }

}