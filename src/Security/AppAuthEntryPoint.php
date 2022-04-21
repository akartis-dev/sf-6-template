<?php

/**
 * @author <akartis-dev>
 */

namespace App\Security;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\EntryPoint\AuthenticationEntryPointInterface;

class AppAuthEntryPoint implements AuthenticationEntryPointInterface
{
    public function __construct(
        private UrlGeneratorInterface $generator
    ) {
    }

    public function start(Request $request, AuthenticationException $authException = null)
    {
        $requestedUrl = $request->getPathInfo();
        $splited = explode("/", $requestedUrl);
        $prefix = $splited[2];
        if ($prefix === "superadmin") {
            return new RedirectResponse($this->generator->generate("app_login_superadmin"));
        }

        if ($prefix === "admin") {
            return new RedirectResponse($this->generator->generate("app_login_admin"));
        }

        return new RedirectResponse($this->generator->generate("app_login"));
    }
}
