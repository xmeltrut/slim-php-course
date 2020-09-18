<?php

namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class ExceptionController extends Controller
{
    public function notFound(Request $request, Response $response)
    {
        return $this->render($response, 'not-found.html');
    }
}
