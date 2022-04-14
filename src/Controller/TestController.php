<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @author <akartis-dev>
 */
class TestController extends AppAbstractController
{
    #[Route('/', name: "index")]
    #[Template]
    public function index()
    {
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
}
