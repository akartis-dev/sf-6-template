<?php

namespace App\Controller;

use App\Entity\Products\Products;
use App\ObjectManager\EntityObjectManager;
use App\Repository\Products\ProductsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/{_locale}')]
class TestController extends AppAbstractController
{
    #[Route('/', name: "index")]
    #[Template]
    public function index(ProductsRepository $repository, EntityObjectManager $em, Request $request)
    {
        $product = $repository->find(1);
        $product = $em->translate($product, 'fr');

        dd($product);
    }

    #[Route('/page', name: "page")]
    #[Template]
    public function page()
    {
    }

    #[Route('/about', name: "about")]
    #[Template]
    public function about()
    {
        sleep(3);
    }

    #[Route('/test', name: "about")]
    #[Template]
    public function test(EntityManagerInterface $em)
    {
        $products = (new Products());
        $products->translate('fr')->setName("Name fr");
        $products->translate('fr')->setDescription("Description fr fr");
        $products->translate('de')->setName("Name de");
        $products->translate('de')->setDescription("Description de de");
        $products->translate('it')->setName("Name it");
        $products->translate('it')->setDescription("Description it it");

        $em->persist($products);
        $products->mergeNewTranslations();
        $em->flush();
        dd($products);
    }
}
