<?php

namespace App\Controller\User;

use App\Controller\AppAbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @author <akartis-dev>
 */
#[Route("/{_locale}/user")]
class UserController extends AppAbstractController
{
    #[Route("/", name: "user_index")]
    public function index()
    {
        dd('connecter');
    }
}
