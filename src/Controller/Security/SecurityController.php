<?php

namespace App\Controller\Security;

use App\Controller\AppAbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AppAbstractController
{
    #[Route(path: '/{_locale}/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login_user.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    #[Route(path: '/{_locale}/admin/login', name: 'app_login_admin')]
    public function adminLogin(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login_admin.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    #[Route(path: '/{_locale}/superadmin/login', name: 'app_login_superadmin')]
    public function superadminLogin(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        $error = $authenticationUtils->getLastAuthenticationError();
        dump($error);
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login_superadmin.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
    }
}
