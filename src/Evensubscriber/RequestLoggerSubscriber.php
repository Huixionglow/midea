<?php
// src/EventSubscriber/RequestLoggerSubscriber.php
namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Psr\Log\LoggerInterface;

class RequestLoggerSubscriber implements EventSubscriberInterface
{
    private $logger;

    public function __construct(LoggerInterface $requestLogger)
    {
        $this->logger = $requestLogger;
    }

    public function onKernelRequest(RequestEvent $event)
    {
        // Only handle the main request to avoid duplicate logs
        if (!$event->isMainRequest()) {
            return;
        }

        $request = $event->getRequest();

        // Collect request data
        $method = $request->getMethod();
        $uri = $request->getUri();
        $ip = $request->getClientIp();
        $queryParams = $request->query->all();
        $requestContent = $request->getContent();

        // Optionally, handle JSON requests for better readability
        if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
            $data = json_decode($requestContent, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                // Sanitize sensitive fields
                $sensitiveFields = ['password', 'token', 'authorization'];
                foreach ($sensitiveFields as $field) {
                    if (isset($data[$field])) {
                        $data[$field] = '****';
                    }
                }
                $requestContent = json_encode($data, JSON_PRETTY_PRINT);
            }
        }

        // Prepare log context
        $context = [
            'method' => $method,
            'uri' => $uri,
            'ip' => $ip,
            'query_params' => $queryParams,
            'request_body' => $requestContent,
        ];

        // Log the request information
        $this->logger->info('Incoming request', $context);
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::REQUEST => ['onKernelRequest', 20], // Higher priority
        ];
    }
}
