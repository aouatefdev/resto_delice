<?php

namespace App\Controller;

use App\Repository\PlatsRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PanierController extends AbstractController 
{

    #[Route('/panier', name:'panier_index')]
    function index(SessionInterface $session, PlatsRepository $platsRepository)
    {
        $panier = $session->get('panier', []);

        $panierData = [];
    
        $montantTotal = 0;
        $totalQtt = 0;

            foreach ($panier as $id => $quantity){
                    $plats = $platsRepository->find($id);
                    $imageName = $platsRepository->find('imageName');
                   
                    $panierData[] = [
                    'imageName' => $imageName,
                    'plats' => $plats,
                    'quantity' => $quantity,         
                    ]; 
                    
                    $montantTotal += $plats->getPrix() * $quantity;
                    $totalQtt +=  $quantity;    
                }
            
        return $this->render('panier/index.html.twig', [
            'panierData' => $panierData,
            'montantTotal' => $montantTotal,
            'totalQtt' => $totalQtt,
        ]);               
    }

    #[Route('/panier/add/{id}', name:'panier_add')]
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

        return $this->redirectToRoute("panier_index");
    }

    #[Route('/panier/decrease/{id}', name:'panier_decrease')]
    function decrease($id, SessionInterface $session, PlatsRepository $PlatsRepository)
        {
        // On récupère le panier actuel

        $panier = $session->get("panier", []);

        if (!empty($panier[$id])) {
            $panier[$id]--;
        } else {
            $panier[$id] = 1;
        }

        // On sauvegarde dans la session
        $session->set("panier", $panier);

        return $this->redirectToRoute("panier_index");
    }

    #[Route('/panier/remove/{id}', name:'panier_remove')]
    function remove($id, SessionInterface $session)
        {
        // On récupère le panier actuel
        $panier = $session->get("panier", []);

        if (!empty($panier[$id])) {

            unset($panier[$id]);
        }

        // On sauvegarde dans la session
        $session->set("panier", $panier);

        return $this->redirectToRoute("panier_index");
    }

    #[Route('/panier/remove', name:'remove_all')]
    function removeAll(SessionInterface $session)
    {
        $session->remove("panier");

        return $this->redirectToRoute("panier_index");
    }

}
