<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @author <akartis-dev>
 */
class TestController extends AppAbstractController
{
    #[Route('/test')]
    #[Template]
    public function test()
    {

    }
}
