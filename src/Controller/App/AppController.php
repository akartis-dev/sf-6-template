<?php
/**
 * @author <akartis-dev>
 */

namespace App\Controller\App;


use App\Controller\AppAbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AppAbstractController
{
    #[Route("/", name: "app_index")]
    public function index()
    {
        return $this->redirectToRoute('index', ['_locale' => 'fr']);
    }
}
