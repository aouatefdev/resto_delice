<?php

namespace App\Controller;

use App\Entity\CommandeItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CommandeItemController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CommandeItem::class;
    }
}