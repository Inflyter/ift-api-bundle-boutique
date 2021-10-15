<?php

namespace Inflyter\BoutiqueBundle\Controller\Shop;


use http\Client\Response;
use Inflyter\BoutiqueBundle\Service\Shop\BoutiqueManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Handles all the shop boutiques actions.
 * @Route("/rest/shop/boutiques", name="shop_boutiques_")
 */
class BoutiqueController extends AbstractController {

    private BoutiqueManager $boutiqueManager;


    function __construct(BoutiqueManager $boutiqueManager) {
        $this->boutiqueManager = $boutiqueManager;
    }


    /**
     * Returns the boutiques for the given categoryID and shop
     *
     * @Areas({"default"})
     * @Route(
     *     "/{categoryId}",
     *     methods={"GET"},
     * )
     * @param Request $request
     * @param int $categoryId
     */
    public function getBoutiquesAction(Request $request, int $categoryId)
    {
        try {

            $boutique = $this->boutiqueManager->formatBoutique($request, null, null);
            $returnData = ["boutique" => json_encode($boutique)];
            return new Response($returnData);
        }
        catch (\Exception $e) {
            return new Response($e->getMessage());
        }
    }



}
