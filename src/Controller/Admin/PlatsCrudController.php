<?php

namespace App\Controller\Admin;

use App\Entity\Plats;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\TextFilter;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;


class PlatsCrudController extends AbstractCrudController
{  

    public static function getEntityFqcn(): string
    {
        return Plats::class;
    }

    public function configureFields(string $pageName): iterable
    {   
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('titre'),
            TextEditorField::new('description'),
            ImageField::new('imageName')
            ->setBasePath('photos/')
            ->setUploadDir('public/photos/'),
            IntegerField::new('imageSize'),
            MoneyField::new('prix')->setCurrency("EUR"),
        ];
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('description', TextFilter::class, [
                'html5' => false,
            ]);
    }
    
}
