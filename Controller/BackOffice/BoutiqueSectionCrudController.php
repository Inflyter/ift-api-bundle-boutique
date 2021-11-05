<?php

namespace Inflyter\BoutiqueBundle\Controller\BackOffice;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Inflyter\BoutiqueBundle\Entity\Shop\BoutiqueSection;

class BoutiqueSectionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return BoutiqueSection::class;
    }


    public function configureFields(string $pageName): iterable
    {

        $default = Parent::configureFields($pageName);//get all the default fields
        $default[] = TextareaField::new('description')->hideOnIndex();
        $default[] = ImageField::new('imageUrl')->onlyOnIndex();
        $default[] = ImageField::new('headerLogoUrl')->onlyOnIndex();
        $default[] = AssociationField::new('boutiqueElements')->hideOnIndex()->setFormTypeOption('disabled','disabled');
        $default[] = AssociationField::new('boutique')->setRequired(true);

        return $default;
    }

}
