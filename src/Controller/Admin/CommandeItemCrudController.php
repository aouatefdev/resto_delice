<?php

namespace App\Controller\Admin;

use App\Entity\CommandeItem;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CommandeItemCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CommandeItem::class;
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            AssociationField::new('commandes'),
            AssociationField::new('plats'),
            TextField::new('platsNom'),
            MoneyField::new('platsPrix')->setCurrency("EUR"),
            IntegerField::new('quantite'),
            ImageField::new('imageName')
            ->setBasePath('photos/')
            ->setUploadDir('public/photos/'),
            NumberField::new('imageSize'),  
        ];
    }  
}
