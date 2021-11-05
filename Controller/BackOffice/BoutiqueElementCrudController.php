<?php

namespace Inflyter\BoutiqueBundle\Controller\BackOffice;

use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Inflyter\BoutiqueBundle\Entity\Shop\BoutiqueElement;

class BoutiqueElementCrudController extends AbstractCrudController
{
    private array $elementTypes = [
        'IMAGE' => 'IMAGE',
        'CAROUSEL' => 'CAROUSEL',
        'TEXT' => 'TEXT',
        'LINE' => 'LINE',
        'SPACER' => 'SPACER',
        'BUTTON' => 'BUTTON',
        'PRODUCT-VERTICAL' => 'PRODUCT-VERTICAL',
        'PRODUCT-HORIZONTAL' => 'PRODUCT-HORIZONTAL',
        'HERO-PRODUCT' => 'HERO-PRODUCT'
    ];
    public static function getEntityFqcn(): string
    {
        return BoutiqueElement::class;
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('elementType')
            ->add('boutiqueSection')
            ;
    }

    public function configureFields(string $pageName): iterable
    {
       $default = Parent::configureFields($pageName);//get all the default fields
        $default[] = ImageField::new('imageUrl')->onlyOnIndex();


        $default[] = FormField::addPanel('General Options');
        $default[] = AssociationField::new('boutiqueSection')->setRequired(true)->setHelp('The parent section in which this element shows.');
        $default[] = ChoiceField::new('elementType')->setChoices($this->elementTypes)->hideOnIndex();
        $default[] = IntegerField::new('position')->setHelp('Defines the order of the element within the parent section');
        $default[] = TextField::new('headline')->hideOnIndex();
        $default[] = TextareaField::new('text')->hideOnIndex();
        $default[] = BooleanField::new('isEmbedded')->setHelp("If switched on the element won't show in the parent section and can be embedded in another element");


        $default[] = FormField::addPanel('Embedded Elements')->setHelp('Other elements or sections included WITHIN this element');
        $default[] = ChoiceField::new('elementActionType')->setChoices(['OPENPAGE' => 'OPENPAGE', 'EXPAND' => 'EXPAND'])->hideOnIndex();
        $default[] = AssociationField::new('embeddedBoutiqueSection');
        $default[] = AssociationField::new('embeddedBoutiqueElement');
        $default[] = AssociationField::new('boutiqueElementAssets')->hideOnIndex()->setFormTypeOption('disabled','disabled');

        $default[] = FormField::addPanel('Image Options')->setHelp('Options for IMAGE elements');
        $default[] = TextField::new('imageUrl')->setHelp('URL of the image')->hideOnIndex();

        $default[] = FormField::addPanel('Product Options')->setHelp('Options for PRODUCT-VERTICAL, PRODUCT-HORIZONTAL or HERO-PRODUCT elements');
        $default[] = IntegerField::new('heroProductId')->setHelp('The productId of the HERO-PRODUCT')->hideOnIndex();
        $default[] = TextField::new('productTag')->setHelp('Displays products which have been tagged with this term')->hideOnIndex();
        $default[] = IntegerField::new('productOffsetInUi')->setHelp('Start the list of products from this index')->hideOnIndex();
        $default[] = IntegerField::new('productLimitInUi')->setHelp('End the list of products at this index')->hideOnIndex();
        $default[] = TextField::new('productButtonTitle')->setHelp('This is button which part of the product list, e.g. SEE MORE')->hideOnIndex();
        $default[] = ChoiceField::new('buttonFontColorCode')->setChoices(['WHITE' => '#ffffff', 'BLACK' => '#000000', 'SMOKY-DARK' => '#ccd1d6', 'SPICY-DARK' =>'#b88f96', 'FRUITY-DARK' => '#fbe485', 'SWEET-DARK' => '#e2ad89'])->hideOnIndex();
        $default[] = ChoiceField::new('buttonBackgroundColorCode')->setChoices(['WHITE' => '#ffffff', 'BLACK' => '#000000', 'SMOKY-DARK' => '#ccd1d6', 'SPICY-DARK' =>'#b88f96', 'FRUITY-DARK' => '#fbe485', 'SWEET-DARK' => '#e2ad89'])->hideOnIndex();
        $default[] = ChoiceField::new('buttonBorderColorCode')->setChoices(['WHITE' => '#ffffff', 'BLACK' => '#000000', 'SMOKY-DARK' => '#ccd1d6', 'SPICY-DARK' =>'#b88f96', 'FRUITY-DARK' => '#fbe485', 'SWEET-DARK' => '#e2ad89'])->hideOnIndex();


        $default[] = FormField::addPanel('Layout Options')->setHelp('Applies to all elements. Overwrites the default.');
        $default[] = ChoiceField::new('elementSize')->setChoices(['MICRO' => 'MICRO', 'SMALL' => 'SMALL', 'MEDIUM' => 'MEDIUM', 'LARGE' => 'LARGE'])->hideOnIndex();
        $default[] = ChoiceField::new('marginTop')->setChoices(['SMALL' => 'SMALL', 'MEDIUM' => 'MEDIUM', 'LARGE' => 'LARGE'])->hideOnIndex();
        $default[] = ChoiceField::new('marginBottom')->setChoices(['SMALL' => 'SMALL', 'MEDIUM' => 'MEDIUM', 'LARGE' => 'LARGE'])->hideOnIndex();

        return $default;
    }

}
