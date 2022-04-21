<?php
/**
 * @author <akartis-dev>
 */

namespace App\EventSubscriber;


use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class RequestSubscribe implements EventSubscriberInterface
{
    public function __construct(private array $locale)
    {
    }

    public static function getSubscribedEvents()
    {
        return [RequestEvent::class => 'onKernelRequest'];
    }

    /**
     * Kernel request to force locale in url if request has no locale
     *
     * @param RequestEvent $event
     */
    public function onKernelRequest(RequestEvent $event): void
    {
        $request = $event->getRequest();

        $redirect = $this->checkLocale($request);

        if ($redirect) {
            $response = new RedirectResponse($redirect);
            $event->setResponse($response);
        }
    }

    /**
     * Return url to redirect with local or null
     *
     * @param Request $request
     * @return string|null
     */
    private function checkLocale(Request $request): ?string
    {
        $locale = array_keys($this->locale);
        $method = $request->getMethod();

        if (Request::METHOD_GET === $method && !in_array($request->getLocale(), $locale, true)) {
            $defaultLocal = "fr";

            return sprintf("/%s%s", $defaultLocal, $request->getRequestUri());
        }

        return null;
    }
}
