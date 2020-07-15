<?php

namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Exception\HttpNotFoundException;

class AuthController extends Controller
{
    public function login(Request $request, Response $response)
    {
        return $this->render($response, 'login.html');
    }
}
