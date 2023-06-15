<?php

namespace App\Controller;

use App\Entity\Commandes;
use App\Entity\CommandeItem;
use App\Repository\PlatsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CommandesController extends AbstractController
{

    #[Route('/commandes', name: 'app_commandes')]
    public function index(SessionInterface $session, PlatsRepository $platsRepository): Response
    { 
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
        
        $panier = $session->get('panier', []);
        $panierData = [];
        $montantTotal = 0;
        $totalQtt = 0;
        

    foreach ($panier as $id => $quantity){
        
            $plats = $platsRepository->find($id);
            $image = $platsRepository->find('image');
                
            $panierData[] = [
            'image' => $image,
            'plats' => $plats,
            'quantity' => $quantity,         
            ];  
            
            $montantTotal += $plats->getPrix() * $quantity;
            $totalQtt +=  $quantity;    
        }

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $session->remove('panier');
        }

        return $this->render('commandes/index.html.twig', [
            'panierData'=> $panierData,
            'montantTotal' => $montantTotal,
            'totalQtt' => $totalQtt,
            'user' => $user,
        ]);

    }

    #[Route('/commandes/valide', name: 'valide_commandes')]
    public function validCommandes(Request $request, SessionInterface $session, PlatsRepository $platsRepository, EntityManagerInterface $entityManager): Response
    { 
        $user = $this->getUser();

        $montantTotal = 0;
        $totalQtt = 0;

        $panier = $session->get('panier', []);

        $commande = new Commandes();        
        $commande->setMontantTotal($montantTotal);
        $commande->setTotalQtt($totalQtt);
        $commande->setUser($user);
        $entityManager->persist($commande); 

        foreach ($panier as $id => $quantity){
            $plats = $platsRepository->find($id);

            if ($plats) {    
                $commandeItem = new CommandeItem(); 
                $commandeItem->setQuantite($quantity);
                $commandeItem->setCommandes($commande);
                $commandeItem->setPlats($plats);
                $commandeItem->setPlatsNom($plats->getTitre());
                $commandeItem->setPlatsPrix($plats->getPrix());

                $entityManager->persist($commandeItem); 

                $montantTotal += $plats->getPrix() * $quantity;
                $totalQtt +=  $quantity;   
            }
        }
            $commande->setMontantTotal($montantTotal);
            $commande->setTotalQtt($totalQtt);

            $entityManager->flush();
                
        return $this->redirectToRoute("app_commandes");     
    }    
}    
