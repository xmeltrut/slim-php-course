<?php

namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class SecondController extends Controller
{
    public function hello(Request $request, Response $response)
    {
        return $this->render($response, 'hello.html', ['name' => 'Chris']);
    }
}
