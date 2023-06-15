<?php

namespace App\Controller\Admin;

use App\Entity\Plats;
use App\Entity\User;
use App\Entity\Commandes;
use App\Entity\CommandeItem;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;


#[IsGranted("ROLE_ADMIN")]
class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'app_admin')] 
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');  
    }
    
    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Admin du Site');
                
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa-solid fa-home');
        yield MenuItem::linkToCrud('User', 'fa-solid fa-user', User::class);
        yield MenuItem::linkToCrud('Plats', 'fa-solid fa-utensils', Plats::class);
        yield MenuItem::linkToCrud('Commandes', 'fa-solid fa-basket-shopping', Commandes::class);
        yield MenuItem::linkToCrud('CommandeItem', 'fa-solid fa-basket-shopping', CommandeItem::class);
    }

    public function configureFields(string $pageName): iterable
    {
        return [               
            TextField::new('plainPassword')
            ->setFormTypeOptions([
                'second_options' => [
                    'label' => 'Confirm Password',
                    'label_attr' => ['style' => 'display: none;'],
                ],
            ])
       ];
    }

}
