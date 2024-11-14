<?php 

namespace App\Monolog;

use Symfony\Component\HttpFoundation\RequestStack;

class RequestBodyProcessor
{
    private $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public function __invoke(array $record)
    {
        $request = $this->requestStack->getCurrentRequest();

        if ($request) {
            // Retrieve the request body
            $content = $request->getContent();

            // Optionally, handle JSON requests for better readability
            if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
                $data = json_decode($content, true);
                if (json_last_error() === JSON_ERROR_NONE) {
                    // Sanitize sensitive fields
                    $sensitiveFields = ['password', 'token', 'authorization'];
                    foreach ($sensitiveFields as $field) {
                        if (isset($data[$field])) {
                            $data[$field] = '****';
                        }
                    }
                    $content = json_encode($data, JSON_PRETTY_PRINT);
                }
            }

            // Add the request body to the log context
            $record['context']['request_body'] = $content;
        }

        return $record;
    }
}
