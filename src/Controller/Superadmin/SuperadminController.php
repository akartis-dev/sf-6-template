<?php

namespace App\Controller\Superadmin;

use App\Controller\AppAbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @author <akartis-dev>
 */
#[Route("/{_locale}/superadmin")]
class SuperadminController extends AppAbstractController
{
    #[Route("/")]
    public function index()
    {
        dd('connecter superadmin');
    }
}
