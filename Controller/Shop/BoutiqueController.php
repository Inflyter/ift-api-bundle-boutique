<?php

namespace Inflyter\BoutiqueBundle\Controller\Shop;


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
	 * TEST
	 *
	 * @Areas({"default"})
	 * @Route(
	 *     "/",
	 *     methods={"GET"},
	 * )
	 * @param Request $request
	 */
	public function index(Request $request)
	{
		try {
			$returnData = json_encode("TEST");
			return  $this->json($returnData);
		}
		catch (\Exception $e) {
			return  $this->json($e->getMessage());
		}
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
            return  $this->json($returnData);
        }
        catch (\Exception $e) {
            return  $this->json($e->getMessage());
        }
    }



}
