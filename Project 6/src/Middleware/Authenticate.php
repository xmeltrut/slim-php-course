<?php

namespace App\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

class Authenticate
{
    private $session;

    public function __construct($session)
    {
        $this->session = $session;
    }

    /**
     * Run the middleware.
     */
    public function __invoke(Request $request, RequestHandler $handler)
    {
        if ($this->session->exists('user')) {
            return $handler->handle($request);
        }

        return $handler->handle($request)->withRedirect('/');
    }
}