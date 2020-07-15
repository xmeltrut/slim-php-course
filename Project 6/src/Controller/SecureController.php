<?php

namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Exception\HttpNotFoundException;

class SecureController extends Controller
{
    public function default(Request $request, Response $response)
    {
        return $this->render($response, 'default.html');
    }
}
