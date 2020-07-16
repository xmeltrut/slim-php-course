<?php

namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Exception\HttpNotFoundException;

class AuthController extends Controller
{
    public function login(Request $request, Response $response)
    {
        //echo $this->ci->get('session')->get('count');
        //$this->ci->get('session')->set('count', ($this->ci->get('session')->get('count') + 1));

        if ($request->isPost()) {
            $this->ci->get('session')->set('user', $request->getParam('email'));
            return $response->withRedirect('/secure');
        }

        return $this->render($response, 'login.html');
    }

    public function logout(Request $request, Response $response)
    {
        $this->ci->get('session')->delete('user');
        return $response->withRedirect('/');
    }
}
