<?php
/**
 * Copyright © 2020 Inflyter S.A.S. - All rights reserved.
 */

namespace Inflyter\BoutiqueBundle\Service\Shop;

use Inflyter\BoutiqueBundle\Entity\Shop\Boutique;
use Exception;
use Symfony\Component\HttpFoundation\Request;

/**
 * Utility class to perform actions on boutiques.
 *
 */
class BoutiqueManager
{

    public function formatBoutique(Request $request, ?Boutique $boutique, ?int $shopId): Boutique
    {
        try {
            $b =  new Boutique();
            $b->setName("test");
            return $b;
            $boutiqueSections = $boutique->getBoutiqueSections();
            foreach ($boutiqueSections as $boutiqueSection){
                if($boutiqueSection->getIsEmbedded()){
                    $boutique->removeBoutiqueSection($boutiqueSection);
                }
                $boutiqueElements = $boutiqueSection->getBoutiqueElements();
                foreach($boutiqueElements as $boutiqueElement){
                    if($boutiqueElement->getIsEmbedded()){
                        $boutiqueSection->removeBoutiqueElement($boutiqueElement);
                    }
                    if(!empty($boutiqueElement->getProductTag())){
                        $prodParams = ['shopId' => $shopId, 'tags' => $boutiqueElement->getProductTag(), 'includeOutOfStock' => true ];
                        $httpParams = http_build_query($prodParams);
                        //$productsUrl = (new ApiLinkModel($request->getSchemeAndHttpHost() . '/rest/shop/products?' . $httpParams, 'GET'));
                        //$boutiqueElement->setProductsUrl($productsUrl);
                    }
                }
            }
            return $boutique;
        }
        catch (Exception $e) {
            return $boutique;
        }
    }
}
