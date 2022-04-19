<?php

namespace App\Controller\Admin;

use App\Controller\AppAbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @author <akartis-dev>
 */
#[Route("/{_locale}/admin")]
class AdminController extends AppAbstractController
{
    #[Route("/")]
    public function index()
    {
        dd('connecter pharmacies');
    }
}
