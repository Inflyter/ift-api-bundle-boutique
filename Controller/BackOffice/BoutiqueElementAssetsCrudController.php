<?php

namespace Inflyter\BoutiqueBundle\Controller\BackOffice;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Inflyter\BoutiqueBundle\Entity\Shop\BoutiqueElementAssets;

class BoutiqueElementAssetsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return BoutiqueElementAssets::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $default = Parent::configureFields($pageName);//get all the default fields
        $default[] = ImageField::new('imageUrl')->onlyOnIndex();
        $default[] = AssociationField::new('boutiqueElement')->setRequired(true);

        return $default;
    }
}
