<?php
/**
 * @author <akartis-dev>
 */

namespace App\Security;


use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\EntryPoint\AuthenticationEntryPointInterface;

class AppAuthEntryPoint implements AuthenticationEntryPointInterface
{
    public function __construct(
        private UrlGeneratorInterface $generator
    )
    {
    }

    public function start(Request $request, AuthenticationException $authException = null)
    {
        $requestedUrl = $request->getPathInfo();
        $splited = explode("/", $requestedUrl);

        if($splited[2] === "superadmin"){
            return new RedirectResponse($this->generator->generate("app_login_superadmin"));
        }

        if($splited[2] === "admin"){
            return new RedirectResponse($this->generator->generate("app_login_admin"));
        }

        return new RedirectResponse($this->generator->generate("app_login"));
    }
}
