<?php

namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Exception\HttpNotFoundException;

class ShopController extends Controller
{
    public function default(Request $request, Response $response)
    {
        $bikes = json_decode(file_get_contents(__DIR__ . '/../../data/bikes.json'), true);

        return $this->render($response, 'default.html', [
            'bikes' => $bikes
        ]);
    }

    public function details(Request $request, Response $response, $args = [])
    {
        $bikes = json_decode(file_get_contents(__DIR__ . '/../../data/bikes.json'), true);

        $key = array_search($args['id'], array_column($bikes, 'id'));

        if ($key === false) {
            throw new HttpNotFoundException($request, $response);
        }

        return $this->render($response, 'details.html', [
            'bike' => $bikes[$key]
        ]);
    }
}
